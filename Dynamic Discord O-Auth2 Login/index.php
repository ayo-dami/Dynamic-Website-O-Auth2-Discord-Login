<?php require('./inc/config.php');?>

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Discord OAuth</title>
	</head>
	<body>
		<?php if( isset($_SESSION['discord_web']) ) {
			header('location: user.php');
		} else {
			echo '<a href="./login.php">login with Discord</a>';
		} ?>
	</body>
</html>
