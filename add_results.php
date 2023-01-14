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
        <form action="" method="post">
            <br>
            <br>
            <fieldset>
            <legend><b>Enter Marks<b></legend>

                <?php
                    //// to start a session and establish a connection to db
                    include("init.php");
                    include("session.php");

                    $select_class_query="SELECT `name` from `class`";
                    $class_result=mysqli_query($conn,$select_class_query);
                    //fetch class name from db to display
                    echo '<select name="class_name">';
                    echo '<option selected disabled>Select Class</option>';
                    
                        while($row = mysqli_fetch_array($class_result)) {
                            $display=$row['name'];
                            echo '<option value="'.$display.'">'.$display.'</option>';
                        }
                    echo'</select>';                      
                ?>

                <input type="text" name="rno" placeholder="Roll No">
                <input type="text" name="p1" id="" placeholder="Introduction to programming">
                <input type="text" name="p2" id="" placeholder="Data Structures and Algorithms">
                <input type="text" name="p3" id="" placeholder="Computer Fundamentals">
                <input type="text" name="p4" id="" placeholder="Operating Systems">
                <input type="text" name="p5" id="" placeholder="Discrete Mathematics">
                <input type="submit" value="Submit">
            </fieldset>
        </form>
    </div>

</body>
</html>

<?php
    
    //error handlers
    if(isset($_POST['rno'],$_POST['p1'],$_POST['p2'],$_POST['p3'],$_POST['p4'],$_POST['p5']))
    {
        $rno=$_POST['rno'];
        if(!isset($_POST['class_name']))
            $class_name=null;
        else
            $class_name=$_POST['class_name'];
        $p1=(int)$_POST['p1'];
        $p2=(int)$_POST['p2'];
        $p3=(int)$_POST['p3'];
        $p4=(int)$_POST['p4'];
        $p5=(int)$_POST['p5'];

        //calculating marks and percentage
        $marks=$p1+$p2+$p3+$p4+$p5;
        $percentage=$marks/5;

        // validation
        if (empty($class_name) or empty($rno) or $p1>100 or  $p2>100 or $p3>100 or $p4>100 or $p5>100 or $p1<0 or  $p2<0 or $p3<0 or $p4<0 or $p5<0 ) {
            if(empty($class_name))
                echo '<p class="error">Please select class</p>';
            if(empty($rno))
                echo '<p class="error">Please enter roll number</p>';
            if(preg_match("/[a-z]/i",$rno))
                echo '<p class="error">Please enter valid roll number</p>';
            if(preg_match("/[a-z]/i",$marks))
                echo '<p class="error">Please enter valid marks</p>';
            if($p1>100 or  $p2>100 or $p3>100 or $p4>100 or $p5>100 or $p1<0 or  $p2<0 or $p3<0 or $p4<0 or $p5<0)
                echo '<p class="error">Please enter valid marks</p>';
            exit();
        }

        $name=mysqli_query($conn,"SELECT `name` FROM `students` WHERE `rno`='$rno' and `class_name`='$class_name'");
        while($row = mysqli_fetch_array($name)) {
            $display=$row['name'];
            echo $display;
         }

        $sql="INSERT INTO `result` (`name`, `rno`, `class`, `p1`, `p2`, `p3`, `p4`, `p5`, `marks`, `percentage`) VALUES ('$display', '$rno', '$class_name', '$p1', '$p2', '$p3', '$p4', '$p5', '$marks', '$percentage')";
        $sql=mysqli_query($conn,$sql);

        if (!$sql) {
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
