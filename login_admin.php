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
        <a href="index.php" class="text1">user</a>
    </div>
    <img src="img/logo.png" width="40%" style="margin-top: -8%;">
    <h1>Login employee</h1>
    <br>
    <form method="post" action="login_admin.php">
        <input type="text" name="email" placeholder="Email address">
        <input type="pass" name="pass" placeholder="Password">
        <br><br>
    <div style="color: red;">
        <?php
            if(isset($_POST['submit'])){
                $login = mysqli_query($con, "SELECT * FROM admin WHERE email = '".trim($_POST['email'])."' AND pass = '".trim($_POST['pass'])."'");
                $data = mysqli_fetch_assoc($login);
                if ($data) {
                    $id = $data['id_admin'];
                    $_SESSION['id_admin'] = $data['id_admin'];
                    echo "<script>window.location.href='listconAdmin.php?id_admin=$id'</script>";
                }else{
                    echo "Please enter your email and password.";
                
                }
            }
        ?>       
    </div>
        <button class="button2" type="reset">Cancel</button>
        <button class="button1" type="submit" name="submit">Log In</button>  
    </form>
    
</div>

</body>
</html>
