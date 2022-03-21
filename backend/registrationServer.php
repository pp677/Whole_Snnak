#!/usr/bin/php
<?php
require_once('../rmq/path.inc');
require_once('../rmq/get_host_info.inc');
require_once('../rmq/rabbitMQLib.inc');

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
			$client = new rabbitMQClient("../rmq/registerToDB.ini", "testServer");
			$validate = $request;
			$response = $client->send_request($validate);
			echo "sending response back to client...\n $response";
			return $response;
  }
}

$server = new rabbitMQServer("../rmq/register.ini","testServer");
echo "Server started" . PHP_EOL;
$server->process_requests('requestProcessor');
exit();
?>

