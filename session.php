<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"SELECT PatrolID FROM users WHERE PatrolID = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['PatrolID'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
?>