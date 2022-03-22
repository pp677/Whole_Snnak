#!/usr/bin/php
<?php
require_once('../rmq/path.inc');
require_once('../rmq/get_host_info.inc');
require_once('../rmq/rabbitMQLib.inc');

function queryDatabase($request)
{
	echo "check for hitting db function\n";
	$client = new rabbitMQClient("../rmq/registerToDB.ini", "testServer");
	echo "initializing RMQ client\n";
	$validate = $request;
	echo "sending retrieved message to db server unbothered\n";
	$response = $client->send_request($validate);
	echo "sending response back to client...\n" . var_dump($response);
	return $response;
}

function requestProcessor($request)
{
  echo "received request".PHP_EOL;
  var_dump($request);
  if(!isset($request['username']))
  {
    return "ERROR: No username provided";
  }
  switch ($request['type'])
  {
		case "register":
			return queryDatabase($request);
	}
	echo "couldn't get message";
	return "couldn't get message";
}

$server = new rabbitMQServer("../rmq/register.ini","testServer");
echo "Server started" . PHP_EOL;
$server->process_requests('requestProcessor');
exit();
?>

