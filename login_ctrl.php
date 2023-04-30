<?php

SESSION_START();

include "db_connection.php"; 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

  $email = $_POST['email'];
  $password = md5($_POST['pword']);


 

$selected_db = mysqli_select_db ($con, 'auction_db');

  if(!$selected_db){

    echo "No Database Selected";

  }


$table_query = "SELECT * FROM users WHERE Email = '$email' AND Password = '$password'";

$table_result = mysqli_query($con,$table_query);

$row = mysqli_fetch_array($table_result,MYSQLI_ASSOC);

    
    
$count = mysqli_num_rows ($table_result);

 

if ($count == 1){

  $last = 1200 + time();

$_SESSION['email'] = $email;    
setcookie(logged, date("F jS - g:i a"), $last);

  header('location:profile.php');

}else{

  echo "Incorrect Username or Password";

}

}

$con->close();

?>












