<?php
  include_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>
    <link rel="stylesheet" href="./css/style1.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
    <!--Login page for admin/teacher and students-->
    <div class="main">
        <div class="login">
            <form action="" method="post" name="login">
                <fieldset>
                    <legend class="heading"><b>Admin/Teacher Login<b></legend>
                    <input type="text" name="userid" placeholder="Username" autocomplete="off" required>
                    <input type="password" name="password" placeholder="Password" autocomplete="off" required>
                    <input type="submit" value="Login">
                </fieldset>
            </form>    
        </div>
        <div class="search">
            <form action="./student.php" method="get">
                <fieldset>
                    <legend class="heading">For Students</legend>
                    <input type="text" name="rn" placeholder="Roll No" required>
                    <?php
                        include('init.php'); //to include connection to db

                        $class_result=mysqli_query($conn,"SELECT `name` FROM `class`");
                            echo '<select name="class">';
                            echo '<option selected disabled>Select Class</option>';
                        while($row = mysqli_fetch_array($class_result)){
                            $display=$row['name'];
                            echo '<option value="'.$display.'">'.$display.'</option>';
                        }
                        echo'</select>'
                    ?>
                    <input type="submit" value="Get Result">
                </fieldset>
            </form>
        </div>
    </div>

</body>
</html>
<?php
    include("init.php");
    session_start(); //starting session

    //error handlers
    if (isset($_POST["userid"],$_POST["password"]))
    {
        $username=$_POST["userid"];
        $password=$_POST["password"];
        $sql = "SELECT userid FROM admin_login WHERE userid='$username' and password = '$password'";
        $result=mysqli_query($conn,$sql);

        $count=mysqli_num_rows($result);
        
        if($count==1) {
            $_SESSION['login_user']=$username;
            header("Location: teacher.php");
        }else {
            echo '<script language="javascript">';
            echo 'alert("Invalid Username or Password")';
            echo '</script>';
        }
        
    }
?>



<?php
  include_once 'footer.php';
?>