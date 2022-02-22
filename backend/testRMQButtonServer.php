#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

function doLogin($username,$password)
{
    // lookup username in databas
    // check password
    return true;
    //return false if not valid
}

function requestProcessor($request)
{
  echo "received request".PHP_EOL;
  var_dump($request);
  if(!isset($request['button']))
  {
    return "ERROR: unsupported message type";
  }
  switch ($request['button'])
  {
		case "button1":
			return "oy men";
		case "button2":
			return "hello men";
		case "button3":
			return "thank you men";
  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

$server = new rabbitMQServer("../rmq/testRMQButton.ini","testServer");
$server->process_requests('requestProcessor');
exit();
?>

