<?php
   // starting a session
   include('init.php');
   session_start();
   $db = mysqli_select_db($conn,'srmsnext');
   // superglobal which is populated by session data
   $user_check = $_SESSION['login_user'];
   
   //to check if user is logged in or not
   $ses_sql = mysqli_query($conn,"select userid from admin_login where userid= '$user_check'");
   $row = mysqli_fetch_array($ses_sql);
   
   $login_session = $row['userid'];
   
   if(!isset($_SESSION['login_user'])){
      header("Location:login.php");
   }
?>