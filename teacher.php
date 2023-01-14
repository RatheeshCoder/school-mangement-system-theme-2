<?php
    include("init.php");
    
    //count of class, students and result tables
    $no_of_classes=mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `class`"));
    $no_of_students=mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `students`"));
    $no_of_result=mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `result`"));
?>
        
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/dash.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <title>Dashboard</title>
    <style type="text/css">
        table{
            width: 50%;
            align-items: center;
            height: 50%;
        }
        table, tr, td {
            border: 2px solid black;
            border-collapse: collapse;
            text-align: left;
        }
        .container{
            margin-top: 100px;
            margin-left: 400px;
            width: 60%;
            border: 3px;
            padding: 10px;
        }
        table caption{
            text-align: left;
            margin-bottom: 5px;
            font-size: 160%;
            padding: 5px;
            letter-spacing: 5px;
            font-weight: bold;
        }
    </style>
</head>
<body>
        
    <?php
     include_once 'header2.php';
    ?>
    
    <div class="container">
    <table>
        <caption><b>Dashboard</b></caption>
            <tr>
                <td>Number of classes:</td>
                <td><?php echo $no_of_classes[0];?></td>
            </tr>
            <tr>
                <td>Number of students:</td>
                <td><?php echo $no_of_students[0];?></td>
            </tr>
            <tr>
                <td>Number of results:</td>
                <td><?php echo $no_of_result[0];?></td>
            </tr>
    </table>
    
    
   
</body>
</html>

<?php
   include('session.php');
?>