#!/bin/bash
export PATH="$PATH:/bin:/usr/bin:/usr/local/bin:/sbin:/usr/sbin:/usr/local/sbin"
export base="$(readlink -f "$(dirname "$0")")";
export url=https://myvps2.interserver.net/vps_queue.php
export dir=${base};
export log=$dir/cron.output;
export old_cron=1;
export pslog=$dir/cron.psoutput;

function age() {
   local filename=$1
   local changed=`stat -c %Y "$filename"`
   local now=`date +%s`
   local elapsed

   let elapsed=now-changed
   echo $elapsed
}

ps ux |grep "/bin/bash $0"|grep -v -e grep -e " $(($$ + 1)) " > $pslog
count=$(cat $pslog|wc -l)
if [ $count -ge 2 ]; then
	echo "Got count $count" >> $log
	cat $pslog >> $log;
	# kill a get list older than 2 hours
	if [ $(age cron.age) -gt 7200 ]; then
		if [ "$(ps uax|grep qs_get_list |grep -v grep)" != "" ]; then
			kill -9 $(ps uax|grep qs_get_list |grep -v grep | awk '{ print $2 }')
		fi
	fi
else
	php qs_cron.php >> cron.output 2>&1
fi
rm -f $pslog
