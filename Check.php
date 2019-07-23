<?php
session_start();

 $con = mysqli_connect('localhost','root');   
   
    mysqli_select_db($con,'softit');


    if(isset($_POST['submit'])){

      if(!empty($_POST['anscheck'])){

        $count = count($_POST['anscheck']);
          echo "you count is". $count;

          $selected = $_POST['anscheck'];
          print_r($selected);

          $q = " select * from question ";
          $query = mysqli_query($con,$q);

          $result = 0;
          $i = 1;
          while ( $rows = mysqli_fetch_array($query)) {
            
              print_r($rows['Ans_id']);

              $stored  = $rows['Ans_id'] == $selected[$i];

              if($stored){

                $result++;

              }

              $i++;

          }

            $uname = $_SESSION['Username'];
            $codes = $_SESSION['code'];



      $check1 = "INSERT INTO `user` (`U_id`, `Username`, `secretcode`, `Totalques`, `Correct`) VALUES (NULL, '$uname', '$codes', '$count', '$result');";
      $resultcheck1 = mysqli_query($con,$check1);   
      

          echo $result;
      }

      
    }
?> 
<!DOCTYPE html>
<html>
   <head>
      <title></title>
      <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<style type="text/css">
</style>

   </head>
   <body>
     <div class="container text-center" >
      <br><br>
      <h1 class="text-center text-success text-uppercase animateuse" > Sacher High School</h1>
      <br><br><br><br>
      <table class="table text-center table-bordered table-hover">
        <tr>
          <th colspan="2" class="bg-dark"> <h1 class="text-white"> Admission Results of <?php echo $uname;  ?></h1></th>
          
        </tr>
        <tr>
            <td>
              Questions Attempted
            </td>
        
          <td>
            <?php
            echo "Out of 25, You have attempt ".$count." option."; ?>
              
            </td>
        
              
        
        <tr>
          <td>
            Your Total score
          </td>
          <td colspan="2">
        <?php 
              echo " Your score is ". $result.".";              
            ?>
            </td>
            </tr>  


      </table>

        <a href="" class="btn btn-success"> LOGOUT </a>
      </div>
   </body>
</html>
