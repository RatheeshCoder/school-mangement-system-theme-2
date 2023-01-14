<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/student.css">
    <title>Result</title>
</head>
<body>
    <?php
        include("init.php"); //establishing a connection to the db

        if(!isset($_GET['class'])) //collects form data
            $class=null;
        else
            $class=$_GET['class'];
        $rn=$_GET['rn'];

        // validation
        if (empty($class) or empty($rn) or preg_match("/[a-z]/i",$rn)) {
            if(empty($class))
                echo '<p class="error">Please select your class</p>';
            if(empty($rn))
                echo '<p class="error">Please enter your roll number</p>';
            if(preg_match("/[a-z]/i",$rn))
                echo '<p class="error">Please enter valid roll number</p>';
            exit();
        }

        $name_sql=mysqli_query($conn,"SELECT `name` FROM `students` WHERE `rno`='$rn' and `class_name`='$class'");
        while($row = mysqli_fetch_assoc($name_sql))
        {
        $name = $row['name'];
        }

        $result_sql=mysqli_query($conn,"SELECT `p1`, `p2`, `p3`, `p4`, `p5`, `marks`, `percentage` FROM `result` WHERE `rno`='$rn' and `class`='$class'");
        while($row = mysqli_fetch_assoc($result_sql)) //associative array
        {
            $p1 = $row['p1'];
            $p2 = $row['p2'];
            $p3 = $row['p3'];
            $p4 = $row['p4'];
            $p5 = $row['p5'];
            $mark = $row['marks'];
            $percentage = $row['percentage'];
        }
        if(mysqli_num_rows($result_sql)==0){
            echo "no result";
            exit();
        }
    ?>

    <div class="goback"> <!--event attribute-->
        <button onclick="window.location.href='login.php';">Back</button>
    </div>
    <div class="container">
        <h1>REPORT CARD</h1>
        <div class="details">
            <span>Name:</span> <?php echo $name ?> 
            <br><br>
            <span>Class:</span> <?php echo $class; ?> 
            <br><br>
            <span>Roll No:</span> <?php echo $rn; ?> 
            <br><br>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Subjects</th>
                    <th>Marks</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Introduction to programming</td>
                    <td><?php echo $p1;?></td>  
                </tr>
                <tr>
                    <td>Data Structures and Algorithms</td>
                    <td><?php echo $p2;?></td>  
                </tr>
                <tr>
                    <td>Computer Fundamentals</td>
                    <td><?php echo $p3;?></td>  
                </tr>
                <tr>
                    <td>Operating Systems</td>
                    <td><?php echo $p4;?></td>  
                </tr>
                <tr>
                    <td>Discrete Mathematics</td>
                    <td><?php echo $p5;?></td>  
                </tr>
            </tbody>
        </table> 

        <div class="result"> <!--non breaking space-->
            <?php echo '<p>Total Marks:&nbsp'.$mark.'</p>';?>
            <?php echo '<p>Percentage:&nbsp'.$percentage.'%</p>';?>
            <?php echo '<p>Attendance:&nbsp'.'85%</p>';?>
        </div>

        <div class="button">
            <button onclick="window.print()">Print Result</button>
        </div>
    </div>
</body>
</html>