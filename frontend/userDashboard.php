<?php session_start(); ?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>User Dashboard</title>
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
	<li class="nav-item">
          <a class="nav-link" href="#">Logout</a>
        </li>

	 <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="userDashboard.php">User Dashboard</a></li>
            <li><a class="dropdown-item" href="#">Logout</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Delete Account</a></li>
          </ul>
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
        <h1>Logout</h1>
        <form method="post">
            <input type="submit" name="logout"  value="Logout">
        </form>
    </div>

		<?php 
			if ($_SESSION['isVerified'] == false)
			{
				echo "<h2>You shouldn't be here, 3 seconds you will disappear</h2>";
				echo "<meta http-equiv='refresh' content='3;URL=login.php'>";
				exit();
			}
			else
			{
				echo "<h2>If seeing this, successfully logged in</h2><br>";
				echo "<h2>Hello " . $_SESSION['username'];
			}

			if (isset($_POST['logout']))
			{
 				unset($_SESSION);
 				session_destroy();
  				echo "<h2>Logging out...</h2>";
				echo "<meta http-equiv='refresh' content='2;URL=login.php'>";
			}
		?>
	</body>
</html>
