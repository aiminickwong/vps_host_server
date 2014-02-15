#!/usr/bin/php -q
<?php
	/**
	 * update_vps_info()
	 *
	 * @return
	 */
	function update_vps_info()
	{
		$root_used = trim(`df -P /| awk '{ print $5 }' |grep % | sed s#"%"#""#g`);
		if ($root_used > 90)
		{
			$hostname = trim(`hostname;`);
			mail('hardware@interserver.net', $root_used . '% Disk Usage on ' . $hostname, $root_used . '% Disk Usage on ' . $hostname);
		}
		$url = 'https://myvps2.interserver.net/vps_queue.php';
		$servers = array();
		switch (trim(`uname -p`))
		{
			case 'i686':
				$servers['bits'] = 32;
				break;
			case 'x86_64':
				$servers['bits'] = 64;
				break;
		}
		$servers['raid_building'] = (trim(`grep -v idle /sys/block/md*/md/sync_action 2>/dev/null`) == '' ? 0 : 1);
		$servers['kernel'] = trim(`uname -r`);
		$servers['load'] = trim(`cat /proc/loadavg | cut -d" " -f1`);
		$servers['ram'] = trim(`free -m | grep Mem: | awk '{ print \$2 }'`);
		$servers['cpu_model'] = trim(`grep "model name" /proc/cpuinfo | head -n1 | cut -d: -f2-`);
		$servers['cpu_mhz'] = trim(`grep "cpu MHz" /proc/cpuinfo | head -n1 | cut -d: -f2-`);
//		$servers['cores'] = trim(`echo \$((\$(lscpu |grep "^Core(s) per socket" | awk '{ print \$4 }') * \$(lscpu |grep "^Socket" | awk '{ print \$2 }')))`);
		$servers['cores'] = trim(`echo \$((\$(cat /proc/cpuinfo|grep '^physical id' | sort | uniq | wc -l) * \$(grep '^cpu cores' /proc/cpuinfo  | tail -n 1|  awk '{ print \$4 }')))`);

		if (file_exists('/usr/sbin/vzctl'))
		{
			$out = trim(`export PATH="\$PATH:/bin:/usr/bin:/sbin:/usr/sbin";df -B G /vz | grep -v ^Filesystem | awk '{ print \$2 " " \$4 }' |sed s#"G"#""#g;`);
		}
		else
		{
			if (trim(`lvdisplay  |grep 'Allocated pool';`) == '')
			{
				$parts = explode(':', trim(`export PATH="\$PATH:/sbin:/usr/sbin"; pvdisplay -c`));
				$pesize = $parts[7];
				$totalpe = $parts[8];
				$freepe = $parts[9];
				$totalg = ceil($pesize * $totalpe / 1000000);
				$freeg = ceil($pesize * $freepe / 1000000);
				$out = "$totalg $freeg";
			}
			else
			{
				$totalg = trim(`lvdisplay /dev/vz/thin |grep 'LV Size' | sed s#"^.*LV Size"#""#g | sed s#"GiB"#""#g | sed s#" "#""#g | cut -d\. -f1`);
				//$freeg = trim(`echo "\$(lvdisplay --units g /dev/vz/thin |grep 'LV Size' | sed s#"LV Size"#""#g | sed s#"GiB"#""#g) - ( \$(lvdisplay /dev/vz/thin |grep 'Allocated .*data' | sed s#"Allocated.*data"#""#g |sort -nr| head -n1 |sed s#"%"#""#g) / 100 * \$(lvdisplay /dev/vz/thin |grep 'LV Size' | sed s#"LV Size"#""#g | sed s#"GiB"#""#g) )" |bc -l |cut -d\. -f1`);
				// this one doubles the space usage to make it stop at 50%
				$freeg = trim(`echo "\$(lvdisplay --units g /dev/vz/thin |grep 'LV Size' | sed s#"LV Size"#""#g | sed s#"GiB"#""#g) - ( \$(lvdisplay /dev/vz/thin |grep 'Allocated .*data' | sed s#"Allocated.*data"#""#g |sort -nr| head -n1 |sed s#"%"#""#g) / 100 * \$(lvdisplay /dev/vz/thin |grep 'LV Size' | sed s#"LV Size"#""#g | sed s#"GiB"#""#g) * 2 )" |bc -l |cut -d\. -f1`);
				$out = "$totalg $freeg";
			}
		}
		$parts = explode(' ', $out);
		if (sizeof($parts) == 2)
		{
			$servers['hdsize'] = $parts[0];
			$servers['hdfree'] = $parts[1];
			$cmd = 'curl --connect-timeout 60 --max-time 240 -k -d action=vpsinfo -d servers="' . urlencode(base64_encode(serialize($servers))) . '" "' . $url . '" 2>/dev/null;';
			// echo "CMD: $cmd\n";
			echo trim(`$cmd`);
		}
	}

	update_vps_info();
?>
