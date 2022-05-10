<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="loginStyle.css">
	 <!-- Required CSS Link -->
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
                
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Whole Snnak</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="registration.php">User Dashboard</a>
        </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

</head>
<body>
    <div class="center">
        <h1>Login</h1>
        <form method="post">
            <div class="textField">
                <input type="text" name="username" required>
                <label for="username">Username</label>
            </div>
            <div class="textField">
		<input type="password" name="password" required>
                <label for="password">Password</label>
            </div>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
<?php
require_once('../rmq/path.inc');
require_once('../rmq/get_host_info.inc');
require_once('../rmq/rabbitMQLib.inc');

$client = new rabbitMQClient("../rmq/login.ini", "testServer");
if (isset($_SESSION['username']))
{
	echo "<meta http-equiv='refresh' content='2;URL=userDashboard.php'>";
}

if (isset($_POST['username']) and isset($_POST['password']))
{
	$request = array('username'=>$_POST['username'], 'password'=>$_POST['password'], 'type'=>'login');
	$response = $client->send_request($request);
	switch ($response['msg'])
	{
		case 'Username or password are invalid. Please retry':
			echo "<meta http-equiv='refresh' content='2;URL=login.php'>";
			exit();
		case 'Verified credentials':
			$_SESSION['isVerified'] = true;
			$_SESSION['username'] = $_POST['username'];
			unset($_POST);
			echo "<meta http-equiv='refresh' content='2;URL=userDashboard.php'>";
			exit();
	}
}
?>
</html>


