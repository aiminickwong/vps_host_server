#!/usr/bin/env php
<?php
/**
 * QuickServer Functionality
 * @author Joe Huss <detain@interserver.net>
 * @copyright 2018
 * @package MyAdmin
 * @category QuickServer
 */
if (ini_get('date.timezone') == '') {
	ini_set('date.timezone', 'America/New_York');
}
if ((isset($_ENV['SHELL']) && $_ENV['SHELL'] == '/bin/sh') && file_exists('/cron.vps.disabled')) {
	exit;
}
$url = 'https://myquickserver2.interserver.net/qs_queue.php';
echo "[" . date('Y-m-d H:i:s') . "] Crontab Startup\n";
$cmd = dirname(__FILE__).'/qs_update_info.php;';
//echo "Running Command: $cmd\n";
echo `$cmd`;
$cmd = dirname(__FILE__).'/qs_get_list.php;';
//echo "Running Command: $cmd\n";
echo `$cmd`;
$cmd = "curl --connect-timeout 60 --max-time 600 -k -d action=get_new_qs '{$url}' 2>/dev/null;";
//echo "Running Command: $cmd\n";
$out = trim(`$cmd`);
if ($out != '') {
	echo "Get New VPS Running:	$out\n";
	echo `$out`;
	$cmd = dirname(__FILE__).'/qs_get_list.php;';
	echo "Running Command: $cmd\n";
	echo `$cmd`;
}
$cmd = dirname(__FILE__).'/qs_traffic.php;';
//echo "Running Command: $cmd\n";
echo `$cmd`;
if (!file_exists('/usr/sbin/vzctl')) {
	$cmd = "curl --connect-timeout 60 --max-time 600 -k -d action=get_ip_map '{$url}' 2>/dev/null;";
	//echo "Running Command: $cmd\n";
	$out = trim(`$cmd`);
	//echo "Get IP List Running:	$out\n";
	if ($out != '') {
		echo `$out`;
	}
	$cmd = "curl --connect-timeout 60 --max-time 600 -k -d action=get_vnc_map '{$url}' 2>/dev/null;";
	//echo "Running Command: $cmd\n";
	$out = trim(`$cmd`);
	//echo "Get IP List Running:	$out\n";
	if ($out != '') {
		echo `$out`;
	}
}
$cmd = "curl --connect-timeout 60 --max-time 600 -k -d action=get_queue '{$url}' 2>/dev/null;";
//echo "Running Command: $cmd\n";
$out = trim(`$cmd`);
if ($out != '') {
	echo "Get Queue Running:$out\n";
	echo `$out`;
	$cmd = dirname(__FILE__).'/qs_get_list.php;';
	echo "Running Command: $cmd\n";
	echo `$cmd`;
}
/*
ob_start();
$out = ob_get_contents();
ob_flush();
echo trim($out);
*/
