<?php
    @session_start();
    include('connection.php');
    $id_user = $_SESSION['id_user'];
    $name_user = $_GET['name_user'];
    $id_con = $_GET['id_con'];
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

<!-- // select zone // -->
<div style="margin:0% 1% 0% 0%;">
  <div class="row" style="padding-inline: 8%;  margin-top: 8%;">
    <div style="background-color: #373737; color: #fff; padding: 10px;">
      <h4 class="container">เลือกโซน</h4>
    </div>
  </div>
  <div class="row" style="padding-inline: 8%; margin-top: 1%;">
    <div class="col-12 text-center card bg-secondary text-white p-5">
      <h1>เวทีแสดง</h1>
    </div>
  </div>

  <div class="row" style="padding-inline: 8%; margin-top: 1%;">
    <a class="col-5" href="seat.php?id_user=<?php echo $id_user ?>&name_user=<?php echo $name_user ?>&id_con=<?php echo $id_con ?>&zone=1">
      <button class="btn btn-info text-white p-5" style="width: 100%;">
        <h1>โซน 1</h1>
      </button>
    </a>
    <div class="col-2"></div>
    <a class="col-5" href="seat.php?id_user=<?php echo $id_user ?>&name_user=<?php echo $name_user ?>&id_con=<?php echo $id_con ?>&zone=2"> 
      <button class="btn btn-info text-white p-5" style="width: 100%;">
        <h1>โซน 2</h1>
      </button>
    </a>
  </div>
  <div class="row" style="padding-inline: 8%; margin-top: 1%;">
    <a class="col-5" href="seat.php?id_user=<?php echo $id_user ?>&name_user=<?php echo $name_user ?>&id_con=<?php echo $id_con ?>&zone=3">
      <button class="btn btn-info text-white p-5" style="width: 100%;">
        <h1>โซน 3</h1>
      </button>
    </a>
    <div class="col-2"></div>
    <a class="col-5" href="seat.php?id_user=<?php echo $id_user ?>&name_user=<?php echo $name_user ?>&id_con=<?php echo $id_con ?>&zone=4"> 
      <button class="btn btn-info text-white p-5" style="width: 100%;">
        <h1>โซน 4</h1>
      </button>
    </a>
  </div>
</div>
<!-- // end select zone // -->

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