<?php
    @session_start();
    include('connection.php');
    $id_user = $_SESSION['id_user'];
    $name_user = $_GET['name_user'];

    $id_con = $_GET['id_con'];
    $sql ="SELECT * FROM con WHERE id_con='$id_con'";
    $result = $con->query($sql);
	if ($result->num_rows>0) {
	while ($row = $result->fetch_assoc()) {
		$id_con = $row['id_con'];
		$name = $row['name'];
		$location = $row['location'];
		$saleday = $row['saleday'];
		$showday = $row['showday'];
        $showtime = $row['showtime'];
        $description = $row['description'];
        $img = $row['img'];
        $id_admin = $row['id_admin'];
        $status = $row['status'];
	}
	}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>คอนเสิร์ต</title>
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

    <div style="padding: 8%; padding-inline: 15%; margin: 0;">
        <div class="row">
            <!-- รูป ___________________________________________________________________________________________________ -->
            <div class="col-3">
                <img src="img/<?php echo $img ?>" width="100%">
            </div>
            <div class="col-9">
                <!-- ชื่อ ___________________________________________________________________________________________________ -->
                <div style="background-color: #373737; color: #fff; padding: 0.5%;">
                    <h4 class="container"><?php echo $name; ?></h4>
                </div>
                <!-- ข้อมูล ___________________________________________________________________________________________________ -->
                <div class="row" style="padding: 2% 5% 1% 5%;">
                    <div class="col-4" style="margin-top: 1%;">
                        วันจำหน่าย
                        <br><div style="padding: 2%;"><?php echo $saleday; ?></div>
                    </div>
                    <div class="col-4" style="margin-top: 1%;">
                        วันแสดง
                        <br><div style="padding: 2%;"><?php echo $showday; ?></div>
                    </div>
                    <div class="col-4" style="margin-top: 1%;">
                        เวลาแสดง
                        <br><div style="padding: 2%;"><?php echo $showtime; ?></div>
                    </div>
                    <div class="col-12" style="margin-top: 1%;">
                        สถานที่
                        <br><div style="padding: 2%;"><?php echo $location; ?></div>
                    </div>
                    <div class="col-6"></div>
                    <div class="col-6 right" style="margin-top: 4%;">
                        <a href="zone.php?id_user=<?php echo $id_user ?>&name_user=<?php echo $name_user ?>&id_con=<?php echo $id_con ?>">
                            <button class="col-12 btn btn-outline-light" style="background-color: #B85FFF;">จองบัตร</button>
                        </a>
                    </div>
                </div>
                <!-- //ข้อมูล ___________________________________________________________________________________________________ -->
            </div>
            <!-- คำอธิบาย ___________________________________________________________________________________________________ -->
            <div class="col-12" style="margin-top: 2%;">
                <div style="background-color: #373737; color: #fff; padding: 0.5%;">
                    <h4 class="container">คำอธิบาย</h4>
                </div>
                <div style="padding: 2% 5% 1% 5%;">
                    <p>
                        <?php echo $description; ?>
                    </p>
                </div>
            </div>
            <!-- //คำอธิบาย ___________________________________________________________________________________________________ -->
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