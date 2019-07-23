<?php
	session_start();
	//connection
	$db = mysqli_connect('localhost','root','','softit');

	if (isset($_POST['submitq'])) {
	  $question = $_POST['question'];
	  $anssid = $_POST['ansid'];

	  $_SESSION['anssid']=$anssid;

	  $qid = $_SESSION['qid'];
	  $ansid = ($qid*4) + $anssid;

	  
	  
	  	$query = "INSERT INTO `question` (`Q_id`, `Question`, `Ans_id`) VALUES (NULL, '$question', '$ansid');";
	  	$results = mysqli_query($db, $query);
	  	if ($results) {
	  	  $_SESSION['done'] = "true";
	  	  //header('location: adminpanel.php');
	  	}
	}

	if (isset($_POST['submita'])) {
	  $option1 = $_POST['option1'];
	  $option2 = $_POST['option2'];
	  $option3 = $_POST['option3'];
	  $option4 = $_POST['option4'];
	  $qid = $_SESSION['qid'];

	  $query1 = "INSERT INTO `answers` (`A_id`, `Answer`, `ans_id`) VALUES (NULL, '$option1', '$qid');";
	  $results = mysqli_query($db, $query1);
	  $query2 = "INSERT INTO `answers` (`A_id`, `Answer`, `ans_id`) VALUES (NULL, '$option2', '$qid');";
	  $results = mysqli_query($db, $query2);
	  $query3 = "INSERT INTO `answers` (`A_id`, `Answer`, `ans_id`) VALUES (NULL, '$option3', '$qid');";
	  $results = mysqli_query($db, $query3);
	  $query4 = "INSERT INTO `answers` (`A_id`, `Answer`, `ans_id`) VALUES (NULL, '$option4', '$qid');";
	  $results = mysqli_query($db, $query4);

	  unset($_SESSION['done']);

   	
	  
	}
mysqli_close($db);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>MCQ World</title>

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
			<a class="navbar-brand" href="adminpanel.php" >Admin Panel</a>
			<a class="navbar-brand" href="addquestion.php" style="color: white;">Insert New Question</a>
			<a class="navbar-brand" href="logout.php">LogOut</a>
			

		</div>

		
	</div>
</nav>
<br><br>

	<div class="container">
		<div class="col-md-2 col-sm-2 col-xm-0"></div>
		<div class="col-md-8 col-sm-8 col-xm-12">
			<br><br>

			<div class="jumbotron">	
				<h3>Insert Question</h3>
				
				<form action="" method="post">
					<div class="form-group">
						<label for="question">Question</label>
						<input type="textarea" class="form-control" id="question" name="question">
					</div>
					<div class="form-group">
						<label for="ansid">Answer Id</label>
						<input type="number" class="form-control" id="ansid"  name="ansid">
					</div>
					<div class="form-group">
						
						<button class="btn btn-primary btn-block" name="submitq">Submit</button>
					</div>
				</form>
			
			</div>



	<?php
				
		if(!empty($_SESSION['done'])){

                  $db = mysqli_connect('localhost','root','','softit');
                  
                  $query = $db->query("SELECT * FROM question ORDER BY Q_id DESC LIMIT 1 ");
                  
                  if($query->num_rows > 0){
                      while($row = $query->fetch_assoc()){
                          $qid = $row['Q_id'];
						  $question= $row['Question'];
                          $aid = $row['Ans_id'];
                          $_SESSION['qid'] = $qid;

    ?>

			
			<div class="jumbotron">
				<h4>Question Id : <?php echo $qid;?></h4>
				<h4>Question : <?php echo $question;?></h4>
				<h4>Set Correct Answer To Field : <?php echo $_SESSION['anssid'];?> </h4>
				<h3>Insert Options</h3>
				
				<form action="" method="post">
					<div class="form-group">
						<label for="option1">Option 1</label>
						<input type="textarea" class="form-control" id="option1" name="option1">
					</div>
					<div class="form-group">
						<label for="option2">Option 2</label>
						<input type="textarea" class="form-control" id="option2" name="option2">
					</div>
					<div class="form-group">
						<label for="option3">Option 3</label>
						<input type="textarea" class="form-control" id="option3" name="option3">
					</div>
					<div class="form-group">
						<label for="option4">Option 4</label>
						<input type="textarea" class="form-control" id="option4" name="option4">
					</div>
					
					<div class="form-group">
						
						<button class="btn btn-primary btn-block" name="submita">Submit</button>
					</div>
				</form>
			
			</div>
		<?php }}} ?>
		</div>
		<div class="col-md-2 col-sm-2 col-xm-0"></div>
	</div>

	

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>