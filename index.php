<?php

session_start();

if (isset($_SESSION["user_id"])) {
	$mysqli = require __DIR__ . "/database.php";

	$sql = "SELECT * FROM user
			WHERE id = {$_SESSION["user_id"]}";
	
	$result = $mysqli->query($sql);

	$user = $result->fetch_assoc();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Anon - eCommerce Website</title>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">



  <!--
    - favicon
  -->
  <link rel="shortcut icon" href="./assets/images/logo/favicon.ico" type="image/x-icon">

  <!--
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style-prefix.css">

  <!--
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
</head>


<body>
	
	<h1>Home</h1>

	<?php if (isset($user)): ?>

		<p>Hello <?= htmlspecialchars($user["name"]) ?></p>

		<p><a href="logout.php">Log out</a></p>
	<?php else: ?>

		<p><a href="login.php">Log In</a> or <a href="signup.html">sign up</a></p>
	<?php endif; ?>

	</body>
	</html>