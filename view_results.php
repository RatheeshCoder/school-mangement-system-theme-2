<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/dash.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" type='text/css' href="css/manage.css">
    <title>Dashboard</title>
</head>
<body>
        
    <?php
     include_once 'header2.php';
    ?>

    <div class="main">
        <?php
            // to start a session and establish a connection to db
            include('init.php');
            include('session.php');

            $sql = "SELECT `name`, `rno`, `class`,`p1`,`p2`,`p3`,`p4`,`p5`,`marks`,`percentage` FROM `result`";
            $result = mysqli_query($conn, $sql);
            
            //checking if table is empty or not
            if (mysqli_num_rows($result) > 0) {
               echo "<table>
                <caption>View Results</caption>
                <tr>
                <th>NAME</th>
                <th>ROLL NO</th>
                <th>CLASS</th>
                <th>Introduction to programming</th>
                <th>Data Structures and Algorithms</th>
                <th>Computer Fundamentals</th>
                <th>Operating Systems</th>
                <th>Discrete Mathematics</th>
                <th>MARKS</th>
                <th>%</th>
                <th>Attendance</th>
                </tr>";

                while($row = mysqli_fetch_array($result))
                  {
                    echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['rno'] . "</td>";
                    echo "<td>" . $row['class'] . "</td>";
                    echo "<td>" . $row['p1'] . "</td>";
                    echo "<td>" . $row['p2'] . "</td>";
                    echo "<td>" . $row['p3'] . "</td>";
                    echo "<td>" . $row['p4'] . "</td>";
                    echo "<td>" . $row['p5'] . "</td>";
                    echo "<td>" . $row['marks'] . "</td>";
                    echo "<td>" . $row['percentage'] . "</td>";
                    echo "<td> 85%</td>";
                    echo "</tr>";
                  }

                echo "</table>";
            }
            else {
                echo "0 Students";
            }
        ?>
    </div>
</body>
</html>
