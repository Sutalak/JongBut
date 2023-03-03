<?php
    @session_start();
    include('connection.php');
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/login.css">
    <title>Log In</title>
</head>
<body>

<div class="login">
    <div class="employee">
        <a href="login_admin.php" class="text1">Admin</a>
    </div>
    <img src="img/logo.png" width="40%" style="margin-top: -8%;">
    <h1>Login</h1>
    <br>
    <form method="post" action="index.php">
        <input type="text" name="email" placeholder="Email address">
        <input type="pass" name="pass" placeholder="Password">
        <br><br>
        <?php
        if(isset($_POST['submit'])){
            $login = mysqli_query($con, "SELECT * FROM user WHERE email = '".trim($_POST['email'])."' AND pass = '".trim($_POST['pass'])."'");
            $data = mysqli_fetch_assoc($login);
            if ($data) {
                $id_user = $data['id_user'];
                $name_user = $data['name'];
                $_SESSION['id_user'] = $data['id_user'];
                $_GET['id_user'] = $data['id_user'];
                echo "<script>window.location.href='home.php?id_user=$id_user&name_user=$name_user'</script>";
            }else{
                echo "Username or password is not correct!";
            }
        }
    ?>
        <button class="button2" type="reset">Cancel</button>
        <button class="button1" type="submit" name="submit">Log In</button>  
    </form>
    <br>
    <a href="signup.php" class="text2">New to accout? Sign up</a>
   
</div>

</body>
</html>
