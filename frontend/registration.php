<!doctype html>
<html lang="en" >

	<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="loginStyle.css">

                <!-- Required CSS Link -->
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
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
          <a class="nav-link" href="registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
        </head>
        <body>
<!-- Required JavaScript Link -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		    <div class="center">
        <h1>Register</h1>
        <form method="post">
            <div class="textField">
                <input type="text" name="firstname" required>
								<label for="firstname">First Name</label>
						</div>
            <div class="textField">
                <input type="text" name="lastname" required>
								<label for="lastname">Last Name</label>
						</div>
            <div class="textField">
                <input type="text" name="username" required>
                <label for="username">Username</label>
            </div>
            <div class="textField">
		<input type="password" name="password" required>
                <label for="password">Password</label>
	    </div>

            <input type="submit" value="Register">
        </form>
    </div>


				</body>
<?php
require_once('../rmq/path.inc');
require_once('../rmq/get_host_info.inc');
require_once('../rmq/rabbitMQLib.inc');

echo "<h3>Post: </h3>";
var_dump($_POST);
$client = new rabbitMQClient("../rmq/register.ini", "testServer");
echo $_POST['firstname'];// . $_POST['lastname'] . $_POST['username'] . $_POST['password'];
if (isset($_POST['firstname']) 
	and isset($_POST['lastname']) 
	and isset($_POST['username']) 
	and isset($_POST['password']))
{
		echo $_POST['firstname'] . $_POST['lastname'] . $_POST['username'] . $_POST['password'];
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		echo "<h3>Hashing password</h3>";
		$request = array(
			'firstname'=>$_POST['firstname'], 
			'lastname'=>$_POST['lastname'],
			'username'=>$_POST['username'],
			'password'=>$password,
			'type'=>'register');
		echo "<h3>Writing message to exchange</h3>";
		$response = $client->send_request($request);
		echo "<h3>Sending response to servers</h3>";
	switch ($response)
	{
		case 'created':
			echo 'Successfully created. Redirecting to login page in 3 seconds';
			echo "<meta http-equiv='refresh' content='3;URL=login.php'>";
			exit();
		case 'notCreated':
			echo 'Username already taken. Please re-enter different username in 3 seconds';
			echo "<meta http-equiv='refresh' content='3;URL=registration.php'>";
			exit();
	}
}
/*else
{
	echo "Please fill in all fields to proceed";
}*/

?>
</html>
