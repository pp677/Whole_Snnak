<?php session_start(); ?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>User Dashboard</title>
	</head>

	<body>
		<?php 
			if ($_SESSION['isVerified'] == false)
			{
				echo "<h2>You shouldn't be here, 3 seconds you will disappear</h2>";
				header("refresh: 3; Location: login.php");
			}
			else
			{
				echo "<h2>If seeing this, successfully logged in</h2><br>";
				echo "<h2>Hello " . $_SESSION['username'];
			}
		?>
	</body>
</html>
