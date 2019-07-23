<?php

session_start();

$con = mysqli_connect('localhost','root');	

	mysqli_select_db($con,'softit');

	if (isset($_POST['validate'])) {
		
	$Username = $_POST['user'];
	$code = $_POST['code'];	

	$_SESSION['Username']= $Username;
    $_SESSION['code']= $code;

    $check1 = "select * from user where Username = '$Username' and secretcode = '$code'";
	$resultcheck1 = mysqli_query($con,$check1);

	$row = mysqli_num_rows($resultcheck1);
	if(!empty($row)){
		header('location:result.php');
	}
	else {
		$check = "select * from secretcode where code = '$code'";
		$resultcheck = mysqli_query($con,$check);

		$row = mysqli_num_rows($resultcheck);
		if($row == 1){

        	$check1 = "select * from user where secretcode = '$code'";
			$resultcheck1 = mysqli_query($con,$check1);
			$row = mysqli_num_rows($resultcheck1);
			if($row == 1){
				
				echo "<script type='text/javascript'>alert('Wrong Username Or Secret Code Already Used by Someone Else');
				window.location.replace(\"index.php\");
				</script>";
				
			}
			else{
				header('location:home.php');
			}	
		}			
				
		else{
			echo "<script type='text/javascript'>alert('Secret Code Invalid. Please Enter A valid Secret Code');
			window.location.replace(\"index.php\");
			</script>";
		}
	}

	

}

?>


