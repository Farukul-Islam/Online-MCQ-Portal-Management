<?php
	session_start();
	$username = "";
	
	//connection
	$db = mysqli_connect('localhost','root','','softit');

	
	if (isset($_POST['login'])) {
	  $username = $_POST['user_name'];
	  $password = $_POST['user_pass'];
	  

	  	$query = "SELECT * FROM admin WHERE name='$username' AND password='$password'";
	  	$results = mysqli_query($db, $query);
	  	if (mysqli_num_rows($results) == 1) {
	  	  $_SESSION['success'] = "Login Successful";
	  	  header('location: adminpanel.php');
	  	  $_SESSION['login']="loggedin";
	  	  
	  	}else {
	  		$_SESSION['failed'] =  "Wrong username/password combination";
	  	}
	  	mysqli_close($db);
	  
	}

?>