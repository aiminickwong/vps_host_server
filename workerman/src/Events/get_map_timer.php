<?php
use Workerman\Connection\AsyncTcpConnection;

return function($stdObject) {
	global $global, $settings;
	$conn = $stdObject->conn;
	$conn->send(json_encode([
		'type' => 'get_map'
	]));
};