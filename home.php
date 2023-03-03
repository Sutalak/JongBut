<?php
    @session_start();
    include('connection.php');
    $id_user = $_SESSION['id_user'];
    $name_user = $_GET['name_user'];
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

    <!-- slid _______________________________________________________________________________________________________ -->
    <div id="demo" class="carousel slide" data-bs-ride="carousel">

        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://images.unsplash.com/photo-1581355931381-d1173e039b4a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1869&q=80" 
                alt="Los Angeles" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1609102026400-3c0ca378e4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1494&q=80"
                 alt="Chicago" class="d-block" style="width:100%">
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1603731147507-cf914716df6e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1494&q=80"
                 alt="New York" class="d-block" style="width:100%">
            </div>
        </div>

        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

<!-- list menu_______________________________________________________________________________________________________ -->
    <div style="padding: 5% 5% 5% 17%; margin: 0;">
        <h3>จับจองที่นั่งก่อนใคร</h3><hr>
        <div class="row">
            <!-- เริ่มตั้งแต่ตรงนี้______________________________________________________________________________________ -->
            <?php
                $sql="SELECT * FROM con WHERE status='1'";
                $result=$con->query($sql);
                if ($result->num_rows > 0) {
                    while($row=$result->fetch_assoc()){
                        $id_con=$row['id_con'];
                        $name=$row['name'];
                        $saleday=$row['saleday'];
                        $img=$row['img'];
            ?>
            <div class="card col-3 m-3">
                <img class="card-img-top" src="img/<?php echo $img ?>" alt="Card image" style="width:100%">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $name ?></h4>
                    <p class="card-text">จำหน่ายถึง : <?php echo $saleday ?></p>
                    <!-- link -->
                    <a href="cons.php?id_user=<?php echo $id_user ?>&name_user=<?php echo $name_user ?>&id_con=<?php echo $id_con ?>">
                        <button class="btn btn-outline-light" style="background-color: #B85FFF;" type="button">อ่านเพิ่มเติม</button>
                    </a>
                </div>
            </div>
            <?php
                    }
                }
            
            ?>
            <!-- ถึงตรงนี้___________________________________________________________________________________________ -->
        </div>
    </div>

<!-- /list menu_______________________________________________________________________________________________________ -->
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