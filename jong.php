<?php
    // @session_start();
    include('connection.php');
    $id_user = $_GET['id_user'];
    $id_tickets = $_GET['id_tickets'];
    $name_user = $_GET['name_user'];

    $sql = "SELECT * FROM con,tickets WHERE con.id_con=tickets.id_con AND tickets.id_tickets='$id_tickets'";
    $re=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($re);
    //edit
    if (isset($_POST['btn_Update'])) {
      $sql="UPDATE tickets SET reserve='1' , id_user='$id_user' WHERE id_tickets = '$id_tickets' ";
      
      if ($con->query($sql)===TRUE) {
        echo "<script>window.location.href='MyTicket.php?id_user=$id_user&name_user=$name_user'</script>";
      }else{
        echo "Error: ".$sql."<br>".$con->error;
      }
    }
    if (isset($_POST['btn_cancel'])) {
      echo "<script>window.location.href='home.php?id_user=$id_user&name_user=$name_user'</script>";
    }
?>
<!DOCTYPE html>
<html>
<head>
  <title>คอนเสิร์ต</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/css.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous">
  </script>
</head>
<body style="background-color: #f1f1f1;">
<!-- // Seat // -->
<div class="card m-auto mt-5 mb-5 shadow" style="width: 800px;">

  <div class="p-5 pb-0">
    <h4 class="modal-title">รายละเอียด</h4>
  </div>
  <div class="p-5 pt-2">
    <!-- form -->
    <form class="row p-2" method="post">
      <div class="col-12">
        <h5>คอนเสิร์ต</h5>
        <div class="card container p-2"><?php echo $row["name"]; ?></div>
      </div>
      <div class="col-12">
        <h5>สถานที่</h5>
        <div class="card container p-2"><?php echo $row["location"]; ?></div>
      </div>
      <div class="col-6">
        <h5>วันแสดง</h5>
        <div class="card container p-2"><?php echo $row["showday"]; ?></div>
      </div>
      <div class="col-6">
        <h5>เวลาแสดง</h5>
        <div class="card container p-2"><?php echo $row["showtime"]; ?></div>
      </div>
      <div class="col-6">
        <h5>โซน</h5>
        <div class="card container p-2"><?php echo $row["zone"]; ?></div>
      </div>
      <div class="col-6">
        <h5>ที่นั่ง</h5>
        <div class="card container p-2"><?php echo $row["seat"]; ?></div>
      </div>
      <div class="col-6">
        <h5>ราคา</h5>
        <div class="card container p-2"><?php echo $row["price"]; ?></div>
      </div>
      <div class="col-12 pt-5 text-center">
        <button class="button2" name="btn_cancel">ยกเลิก</button>
        <button class="button1" name="btn_Update">จองบัตร</button>
      </div>
    </form>
    <!-- form -->

  </div>
</div>
</body>
</html>