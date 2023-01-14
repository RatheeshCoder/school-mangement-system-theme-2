<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/dash.css">
    <link rel="stylesheet" type="text/css" href="./css/form.css" media="all">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <title>Add Students</title>
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
                <legend><b>Add Student<b></legend>
                <input type="text" name="student_name" placeholder="Student Name">
                <input type="text" name="roll_no" placeholder="Roll No">
                <?php
                    // to start a session and establish a connection to db
                    include('init.php');
                    include('session.php');
                    
                    $class_result=mysqli_query($conn,"SELECT `name` FROM `class`");
                        echo '<select name="class_name">';
                        echo '<option selected disabled>Select Class</option>';
                    while($row = mysqli_fetch_array($class_result)){
                        $display=$row['name'];
                        echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select>'
                ?>
                <input type="submit" value="Submit">
            </fieldset>
        </form>
    </div>
</body>
</html>

<?php
    //checking for empty fields
    if(isset($_POST['student_name'],$_POST['roll_no'])) {
        $name=$_POST['student_name'];
        $rno=$_POST['roll_no'];
        if(!isset($_POST['class_name']))
            $class_name=null;
        else
            $class_name=$_POST['class_name'];

        // validation
        if (empty($name) or empty($rno) or empty($class_name) or preg_match("/[a-z]/i",$rno) or !preg_match("/^[a-zA-Z ]*$/",$name)) {
            if(empty($name))
                echo '<p class="error">Please enter name</p>';
            if(empty($class_name))
                echo '<p class="error">Please select your class</p>';
            if(empty($rno))
                echo '<p class="error">Please enter your roll number</p>';
            if(preg_match("/[a-z]/i",$rno))
                echo '<p class="error">Please enter valid roll number</p>';
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                    echo '<p class="error">No numbers or symbols allowed in name</p>'; 
                  }
            exit();
        }
        
        $sql = "INSERT INTO `students` (`name`, `rno`, `class_name`) VALUES ('$name', '$rno', '$class_name')";
        $result=mysqli_query($conn,$sql);
        
        if (!$result) {
            echo '<script language="javascript">';
            echo 'alert("Invalid Details")';
            echo '</script>';
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Successful")';
            echo '</script>';
        }

    }

?>