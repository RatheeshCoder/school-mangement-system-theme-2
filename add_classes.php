<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/dash.css">
    <link rel="stylesheet" href="./css/form.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <title>Add Class</title>
</head>
<body>
        
    <?php
     include_once 'header2.php';
    ?>

    <div class="main">
        <form action="" method="post">
            <br>
            <br>
            <fieldset>
                <legend><b>Add Class<b></legend>
                <input type="text" name="class_name" placeholder="Class Name">
                <input type="text" name="class_id" placeholder="Class ID">
                <input type="submit" value="Submit">
            </fieldset>        
        </form>
    </div>
    
</body>
</html>

<?php 
	
    // to start a session and establish a connection to db
    include('init.php');
    include('session.php');
    if (isset($_POST['class_name'],$_POST['class_id'])) {
        $name=$_POST['class_name'];
        $id=$_POST['class_id'];

        // validation 
        if (empty($name) or empty($id) or preg_match("/[a-z]/i",$id)) {
            if(empty($name))
                echo '<p class="error">Please enter class</p>';
            if(empty($id))
                echo '<p class="error">Please enter class id</p>';
            if(preg_match("/[a-z]/i",$id))
                echo '<p class="error">Please enter valid class id</p>';
            exit();
        }

        //insert command to add classes to database
        $sql = "INSERT INTO `class` (`name`, `id`) VALUES ('$name', '$id')";
        $result=mysqli_query($conn,$sql);
        
        if (!$result) {
            echo '<script language="javascript">';
            echo 'alert("Invalid class name or class id")';
            echo '</script>';
        } else{
            echo '<script language="javascript">';
            echo 'alert("Successful")';
            echo '</script>';
        }
    }


?>