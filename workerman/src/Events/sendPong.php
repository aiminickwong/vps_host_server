<?php
use Workerman\Connection\AsyncTcpConnection;
use Workerman\Worker;

/**
* ran periodicaly to update our vps mapping files
*/
return function($stdObject) {
	$stdObject->conn->send(json_encode(['type' => 'pong'])); // send pong request to hub
};
