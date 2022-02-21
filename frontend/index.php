<!doctype html>
<html lang="en" >
	<head>
		<!-- Required CSS Link -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

		<title> yemen </title>
	</head>
	<body>

		<h1>Hello World!  It Workie!</h1>
		<form enctype="multipart/form-data" autocomplete="off" method="post">
			<button type="submit" name="button1" class="btn btn-primary">This</button>
			<button type="submit" name="button2" class="btn btn-secondary">That</button>
			<button type="submit" name="button3" class="btn btn-dark">Third</button>
		</form>

<?php
require_once('../rmq/path.inc');
require_once('../rmq/get_host_info.inc');
require_once('../rmq/rabbitMQLib.inc');
//require_once('../rmq/testRMQButton.ini');
$client = new rabbitMQClient("../rmq/testRMQButton.ini", "testServer");
if (isset($_POST['button1']))
{
	$request = array('button'=>'button1');
	$response = $client->send_request($request);
}
elseif (isset($_POST['button2']))
{
	$request = array('button'=>'button2');
	$response = $client->send_request($request);
}
elseif (isset($_POST['button3']))
{
	$request = array('button'=>'button3');
	$response = $client->send_request($request);
}

echo "<h2> $response </h2>";
echo var_dump($_POST);
/*(if (!isset($_SESSION))
{
	session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$_SESSION['postdata'] = $_POST;
	unset($_POST);
	header("Location: ".$_SERVER['PHP_SELF']);
	exit;
}

if (@$SESSION_['postdata'])
{
	$_POST = $_SESSION['postdata'];
	unset($_SESSION['postdata'];
}*/
unset($_POST);
$_POST = array();
echo var_dump($_POST);
//header("Location: " . $_SERVER['PHP_SELF']);
//exit;
?>

		<!-- Required JavaScript Link -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	</body>
</html>
