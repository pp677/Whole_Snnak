<!doctype html>
<html lang="en" >
	<head>
		<!-- Required CSS Link -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<title>Home Page</title>
<link rel="stylesheet" href="loginStyle.css">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Whole Snnak</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
	</li>

        </li>
      </ul>
    </div>
  </div>
</nav>
	<body>

		<div class="row justify-content-md-center mt-5">
			<div class="col-md-auto my-auto">
			<p class="display-1"> WholeSnnak </p>
			</div>
		</div>
		<center>  <img src="./Wholesnnak.png"> </center>

		
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
//header("Location: " . $_SERVER['PHP_SELF']);
//exit;
?>

		<!-- Required JavaScript Link -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	</body>
</html>
