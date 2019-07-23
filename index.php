
<?php 
	session_start();
	$con = mysqli_connect('localhost','root');	

	mysqli_select_db($con,'softit');		

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	 <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
<!-- 
	 font-family: 'Montserrat', sans-serif; 
	font-family: 'Open Sans', sans-serif;
	-->

</head>
<body>

	<div class="container"><br><br>
		<h1 class="text-center"> Welcome to Sacher high School </h1><br><br><br>

		<div class="col-md-3 col-sm-3 col-xm-0"></div>
			
			<div class="col-md-6 col-sm-6 col-xm-12">
				
					<h4 class="text-center"> Login Form </h4>
					<br>
					<form action="validation.php" method="post">
						<div class="form-group">
							<label for="user "> Username: </label>
							<input type="text" name="user" id="user" class="form-control">
						</div>
						<div class="form-group">
							<label for="code "> Secret Code: </label>
							<input type="text" name="code" id="code" class="form-control">
						</div>
						<button class="btn btn-success btn-block" name="validate" type="submit"> Login </button>
					</form>
				
				
			</div>
			
		<div class="col-md-3 col-sm-3 col-xm-0"></div>
	</div>
				

</body>
</html>