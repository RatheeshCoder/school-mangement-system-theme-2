<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/dash.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/form.css">
    <title>Dashboard</title>
</head>
<body>
        
    <?php
    include_once 'header2.php';
    ?>
    <div class="main">
        <br><br>
        <form action="" method="post">
            <fieldset>
                <legend><b>Delete Result</b></legend>
                <?php
                    //to start a session and establish a connection to db
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
                <input type="text" name="rno" placeholder="Roll No">
                <input type="submit" value="Delete">
            </fieldset>
        </form>
        <br><br>

        <form action="" method="post">
            <fieldset>
                <legend><b>Update Result</b></legend>
                
                <?php
                    $class_result=mysqli_query($conn,"SELECT `name` FROM `class`");
                        echo '<select name="class">';
                        echo '<option selected disabled>Select Class</option>';
                    while($row = mysqli_fetch_array($class_result)){
                        $display=$row['name'];
                        echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select>'
                ?>
                
                <input type="text" name="rn" placeholder="Roll No">
                <input type="text" name="p1" id="" placeholder="Introduction to programming">
                <input type="text" name="p2" id="" placeholder="Data Structures and Algorithms">
                <input type="text" name="p3" id="" placeholder="Computer Fundamentals">
                <input type="text" name="p4" id="" placeholder="Operating Systems">
                <input type="text" name="p5" id="" placeholder="Discrete Mathematics">
                <input type="submit" value="Update">
            </fieldset>
        </form>
    </div>
    
</body>
</html>

<?php
    if(isset($_POST['class_name'],$_POST['rno'])) {
        $class_name=$_POST['class_name'];
        $rno=$_POST['rno'];
        echo $class_name;
        echo $rno;
        $delete_sql=mysqli_query($conn,"DELETE from `result` where `rno`='$rno' and `class`='$class_name'");
        if(!$delete_sql){
            echo '<script language="javascript">';
            echo 'alert("Not available")';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Deleted")';
            echo '</script>';
        }
    }

    if(isset($_POST['rn'],$_POST['p1'],$_POST['p2'],$_POST['p3'],$_POST['p4'],$_POST['p5'],$_POST['class'])) {
        $rno=$_POST['rn'];
        $class_name=$_POST['class'];
        $p1=(int)$_POST['p1'];
        $p2=(int)$_POST['p2'];
        $p3=(int)$_POST['p3'];
        $p4=(int)$_POST['p4'];
        $p5=(int)$_POST['p5'];

        //calculating total marks and percentage of a student
        $marks=$p1+$p2+$p3+$p4+$p5;
        $percentage=$marks/5;
        
        //update query
        $sql="UPDATE `result` SET `p1`='$p1',`p2`='$p2',`p3`='$p3',`p4`='$p4',`p5`='$p5',`marks`='$marks',`percentage`='$percentage' WHERE `rno`='$rno' and `class`='$class_name'";
        $update_sql=mysqli_query($conn,$sql); // returns an object when a query runs in db

        if(!$update_sql){
            echo '<script language="javascript">';
            echo 'alert("Invalid Details")';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Updated")';
            echo '</script>';
        }
    }
?>