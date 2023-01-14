<?php
   session_start();
   //destroy the session variables in our session to logout the user
   if(session_destroy()) {
        header("Location: login.php");
        echo '<script language="javascript">';
        echo 'alert("Logout successful")';
        echo '</script>';

   }
?>