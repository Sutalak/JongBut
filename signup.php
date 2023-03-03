<?php
  @session_start();
  include('connection.php');
  if(isset($_POST["back"])) {
    echo "<script>window.location.href='index.php'</script>";
  }
  
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/signups.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Sign up</title>
</head>
<body>

<div class="signup">
<div class="employee">
    <a href="login_admin.php" class="text1">employee</a>
</div>
  <img src="img/logo.png" width="50%" style="margin-top: -8%;">
  <h1>Sign up</h1>
  <br>
  <form method="post">
    <input type="text" name="name" placeholder="First name">
    <input type="text" name="lname" placeholder="Last name">
    <select name="sex" style="width: 88%; padding:2%;">
        <option>male</option>
        <option>female</option>
    </select>
    <input type="date" name="birthday" placeholder="Birthday">
    <input type="text" name="address" placeholder="Address">
    <input type="text" name="phone" placeholder="Phone">
    <input type="text" name="id_card" placeholder="ID card">
    <br><br>
    <input type="text" name="email" placeholder="Email address">
    <input type="pass" name="pass" placeholder="Password">
    <div class="text-danger">
      <?php
        // _ Add __
        if(isset($_POST["signup"])) {
          // $id_user=$_POST['id_user'];
          $name=$_POST['name'];
          $lname=$_POST['lname'];
          $sex=$_POST['sex'];
          $birthday=$_POST['birthday'];
          $address=$_POST['address'];
          $phone=$_POST['phone'];
          $id_card=$_POST['id_card'];
          $email=$_POST['email'];
          $pass=$_POST['pass'];

          if($email=='' & $pass==''){
            echo "Please enter your email and password.";
          }else{
            $sql="INSERT INTO user (name, lname, sex, birthday, address, phone, id_card, email, pass) 
            VALUES ('$name', '$lname', '$sex', '$birthday', '$address', '$phone', '$id_card', '$email', '$pass')";
            if ($con->query($sql)===TRUE) {
              echo "<script>window.location.href='index.php'</script>";
            }
          }
        }
      ?>      
    </div>  
    <br><br>
    <button class="button2" type="reset" name="back">Cancel</button>
    <button class="button1" type="submit" name="signup">Sign up</button>  
  </form>

  <br>
  <a href="index.php" class="text2">You have an account? Log in</a>

</div>

</body>
</html>
