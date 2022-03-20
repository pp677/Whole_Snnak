#!/usr/bin/php
<?php
require_once('connectDB.php');
require_once('../rmq/path.inc');
require_once('../rmq/get_host_info.inc');
require_once('../rmq/rabbitMQLib.inc');

function requestProcessor($request)
{
	echo "received request".PHP_EOL;
	$conn = mysqli_connect($host, $user, $pass, $db);
	$username = $request['username'];
	$password = $request['password'];

	if (mysqli_connect_errno())
	{
		return "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	else
	{
		echo "Successfully connected to MySQL\nQuerying...";
		$query = "select * from user where username = '$username'";
		$loginUser = mysqli_query($query);
		$result = mysqli_num_rows($loginUser);

		if ($result == 0)
		{
			return ('msg'=>'Username or password are invalid. Please retry');
		}
		else
		{
			$row = mysqli_fetch_array($loginUser);
			$hash = $row['password'];
			if (password_verify($password, $hash))
			{
				return ('msg'=>'Verified credentials');
			}
		}
	}
}

$server = new rabbitMQServer("../rmq/loginToDB.ini","testServer");
echo "Server started" . PHP_EOL;
$server->process_requests('requestProcessor');
exit();
?>
