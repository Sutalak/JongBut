<?php
    @session_start();
    include('connection.php');
    $id_user = $_SESSION['id_user'];
    $name_user = $_GET['name_user'];
    $id_con = $_GET['id_con'];
    $zone = $_GET['zone'];
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
<body>
<!-- Bar_______________________________________________________________________________________________________ -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
        <div class="container-fluid">
            <ul class="navbar-nav me-auto" style="padding-left: 25px;">
                <!-- logo -->
                <li class="nav-item btn-group">
                    <a class="nav-link" href="home.php?id_user=<?php echo $id_user ?>&name_user=<?php echo $name_user ?>" style="color: #B85FFF;">
                        <img src="img/logo.png" width="50px" style="margin-top: -3px;">
                        Jongbut
                    </a>
                </li>
                <!-- link -->
                <li class="nav-item" style="padding-left: 25px; margin-top: 9px;">
                    <a class="nav-link" href="home.php?id_user=<?php echo $id_user ?>&name_user=<?php echo $name_user ?>">หน้าแรก</a>
                </li>
                <li class="nav-item" style="margin-top: 9px;">
                    <a class="nav-link" href="listcon.php?id_user=<?php echo $id_user ?>&name_user=<?php echo $name_user ?>">คอนเสิร์ต</a>
                </li>
            </ul>
            <div class="d-flex" style="padding-inline: 100px;">
                <a class="btn-gray p-2" href="MyTicket.php?id_user=<?php echo $id_user ?>&name_user=<?php echo $name_user ?>">
                    ตั๋วของฉัน
                </a>
                <div class="dropdown">
                    <button class="btn dropdown-toggle p-2" data-bs-toggle="dropdown">
                        <a class="btn-gray"><?php echo $name_user ?></a>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logout">ออกจากระบบ</a></li>
                    </ul>
                </div>
            </div>
            </div>
            
        </div>
    </nav>

<!-- Bar_______________________________________________________________________________________________________ -->

<!-- // select seat // -->
<div style="margin:0% 1% 0% 0%;">
  <div class="row" style="padding-inline: 8%; margin-top: 8%;">
    <div style="background-color: #373737; color: #fff; padding: 10px;">
      <h4 class="container">เลือกที่นั่ง</h4>
    </div>
    <h1 class="m-4">โซน : <?php echo $zone ?></h1>
  </div>
  <div style="padding-inline: 9%;">
    <?php
      $sql ="SELECT * FROM con,tickets WHERE con.id_con=tickets.id_con AND tickets.zone='$zone' AND tickets.reserve='0' 
      AND tickets.id_con='$id_con'";
      $result=$con->query($sql);
      if ($result->num_rows > 0) {
        while($row=$result->fetch_assoc()){
          $id_con = $row['id_con'];
          $id_tickets = $row['id_tickets'];
          $zone = $row['zone'];
          $seat = $row['seat'];
    ?>
    <a class="btn" href="jong.php?id_user=<?php echo $id_user ?>&name_user=<?php echo $name_user ?>&id_tickets=<?php echo $id_tickets ?>">
      <button type="button" class="btn btn-outline-info"><?php echo $zone ?>-<?php echo $seat ?></button>
    </a>
    <?php }} ?>
  </div>
</div>

<!-- /Modal Logout_______________________________________________________________________________________________________ -->
<div class="modal" id="logout">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Logout</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        คุณต้องการออกจากระบบใช่หรือไม่
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">ยกเลิก</button>
        <a href="index.php">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">ตกลง</button>
        </a>
      </div>

    </div>
  </div>
</div>
</body>
</html>