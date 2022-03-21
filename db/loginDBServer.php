#!/usr/bin/php
<?php
require_once('../rmq/path.inc');
require_once('../rmq/get_host_info.inc');
require_once('../rmq/rabbitMQLib.inc');

function requestProcessor($request)
{
	echo "received request".PHP_EOL;
	$host = "localhost";
	$user = "root";
	$pass = "root";
	$db = "WholeSnnak";
	$conn = mysqli_connect($host, $user, $pass, $db);
	$username = $request['username'];
	$password = $request['password'];

	if (mysqli_connect_errno())
	{
		return "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	else
	{
		echo "Successfully connected to MySQL\nQuerying...\n";
		$query = "SELECT * FROM user WHERE username = '$username'";
		$loginUser = mysqli_query($conn, $query);
		$result = mysqli_num_rows($loginUser);

		if ($result == 0)
		{
			echo mysqli_error($conn) . "\n no results from query\n";
			return array('msg'=>"Username or password are invalid. Please retry");
		}
		else
		{
			$row = mysqli_fetch_array($loginUser);
			$hash = $row['password'];
			if (password_verify($password, $hash))
			{
				echo "verified credentials\n";
				return array('msg'=>'Verified credentials');
			}
		}
	}
}

$server = new rabbitMQServer("../rmq/loginToDB.ini","testServer");
echo "Server started" . PHP_EOL;
$server->process_requests('requestProcessor');
exit();
?>

