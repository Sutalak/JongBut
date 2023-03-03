<?php
    @session_start();
    include('connection.php');
    $id_admin = $_SESSION['id_admin'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>My Ticket</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/css.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<!-- Bar_______________________________________________________________________________________________________ -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
    <div class="container-fluid">
        <ul class="navbar-nav me-auto" style="padding-left: 25px;">
            <!-- logo -->
            <li class="nav-item btn-group">
                <a class="nav-link" href="listconAdmin.php?id_admin=<?php echo $id_admin ?>" style="color: #B85FFF;">
                    <img src="img/logo.png" width="50px" style="margin-top: -3px;">
                    Jongbut
                </a>
            </li>
            <!-- link -->
            <li class="nav-item" style="margin-top: 9px;">
                <a class="nav-link" href="listconAdmin.php?id_admin=<?php echo $id_admin ?>">จัดการคอนเสิร์ต</a>
            </li>
            <li class="nav-item" style="margin-top: 9px;">
                <a class="nav-link" href="TicketAdmin.php?id_admin=<?php echo $id_admin ?>">จัดการตั๋ว</a>
            </li>
        </ul>
        <div class="d-flex">
            <a class="btn-gray" style="padding-right: 150px;" data-bs-toggle="modal" data-bs-target="#logout">
                ออกจากระบบ
            </a>
        </div>
        </div>
        
    </div>
</nav>
<!-- //Bar_______________________________________________________________________________________________________ -->
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
</div>
<div style="margin: 8% 5% 5% 5%;">
    <h2>จัดการตั๋วคอนเสิร์ต</h2>
    <hr>
</div>
<!-- list menu_______________________________________________________________________________________________________ -->
<div style="margin: -3% 2% 5% 13%;">
    <div class="row">
        <!-- เริ่มตั้งแต่ตรงนี้______________________________________________________________________________________ -->
        <?php
            $sql = "SELECT * FROM con";
            $result=$con->query($sql);
            if ($result->num_rows > 0) {
                while($row=$result->fetch_assoc()){
                    $id_con=$row['id_con'];
                    $name=$row['name'];
                    $img=$row['img'];
                    $saleday = $row['saleday'];
        ?>
        <div class="card col-2 m-1">
            <img class="card-img-top" src="img/<?php echo $img ?>" alt="Card image" style="width:100%">
            <div class="card-body">
                <h4 class="card-title"><?php echo $name ?></h4>
                <p class="card-text">จำหน่าย : <?php echo $saleday ?></p>
                <a href="setingticket.php?id_admin=<?php echo $id_admin ?>&id_con=<?php echo $id_con ?>">
                    <button class="btn btn-outline-light" style="background-color: #B85FFF;" type="button">จัดการตั๋ว</button>
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
