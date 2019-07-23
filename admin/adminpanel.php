<?php
session_start();
if (empty($_SESSION['login'])) {
    header("location: index.php");
}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Panel</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>



<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" style="color: white;">Admin Panel</a>
			<a class="navbar-brand" href="addquestion.php">Insert New Question</a>
			<a class="navbar-brand" href="logout.php">LogOut</a>
			

		</div>

		
	</div>
</nav>
	<br><br>
	<div class="container"><br><br>
		<div class="jumbotron">
			<h3>Welcome To Admin Panel</h3>
		</div>

	</div>
    

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>