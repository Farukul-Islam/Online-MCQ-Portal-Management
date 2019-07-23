<?php
session_start();
include 'home.php';
$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'softit');

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>     
      
</head>
<body>
	<div class="container">
		
		<br><h1 class="text-center text-primary"> SHS Admission </h1><br>
		<h2 class="text-center text-success"> Welcome,Select one Currect answer out of 4.Best of Luck :) </h2><br>


		<div class="col-lg-10 d-block m-auto bg-light quizsetting">

		<form action="Check.php" method="post">

		<?php 

		for ($i=1;$i<100; $i++) {
			$l = 1;                  
            $ansid = $i;

		$q = "select * from question where Q_id = $i";
		$query = mysqli_query($con,$q);

		while ($rows = mysqli_fetch_array($query)) {
			 ?>

			 <div class="card-header">
			 	
			 	<h4 class="card-header text-center"> <?php echo $rows['Question']  ?> </h4>

			 	<?php 

					$q = "select * from answers where ans_id = $i";
					$query = mysqli_query($con,$q);

					while ($rows = mysqli_fetch_array($query)) {
			 ?>
			 	<div class="card-body">
			 		
			 			<input type="radio" name="anscheck[<?php echo $rows['ans_id'] ?>]" value="<?php echo $rows['A_id'] ?>">
			 			<?php echo $rows['Answer']; ?>

			 	</div>


			 


	<?php 
		}
		}
	}

 		?>

 		<input type="submit" name="submit" value="Submit" class="btn btn-success m-auto d-block">
 		</form>
 		</div>

	</div><br> 
	
 	</div>

</body>
</html>