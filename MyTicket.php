<?php
    @session_start();
    include('connection.php');
    $id_user = $_SESSION['id_user'];
    $name_user = $_GET['name_user'];
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

<div class="container p-5 my-5">
    <!-- tap -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#jong">การจองของฉัน</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#pay">ประวัติการชำระ</a>
        </li>
    </ul>
    <!-- table loop -->
    <div class="tab-content">
        <table class="table table-striped container tab-pane active" id="jong">
            <thead>
                <tr>
                    <th style=" width: 20%;">ชื่อคอนเสิร์ต</th>
                    <th style=" width: 10%;">โซนที่สั่ง</th>
                    <th style=" width: 10%;">ที่นั่ง</th>
                    <th style=" width: 10%;">ราคาตั๋ว</th>
                    <th style=" width: 5%;"> </th>
                    <th style=" width: 5%;"> </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql="SELECT * FROM con,tickets WHERE tickets.id_con = con.id_con AND tickets.reserve='1' 
                    AND tickets.id_user='$id_user' AND tickets.payday='0000-00-00'";
                    $result=$con->query($sql);
                    if ($result->num_rows > 0) {
                        while($row=$result->fetch_assoc()){
                            $id_con = $row['id_con'];
                            $id_tickets = $row['id_tickets'];
                            $namecon = $row['name'];
                            $zone = $row['zone'];
                            $seat = $row['seat'];
                            $price = $row['price'];
                ?>
                <tr class="col-sm">
                    <form method="post">
                        <td class="p-3 pb-0"><?php echo $namecon ?></td>
                        <td class="p-3 pb-0"><?php echo $zone ?></td>
                        <td class="p-3 pb-0"><?php echo $seat ?></td>
                        <td class="p-3 pb-0"><?php echo $price ?></td>
                        <td>
                            <!-- //---------- pay ---------------// -->
                            <button type="button" class="btn-SlateBlue width" 
                            data-bs-toggle="modal" data-bs-target="#PayTicket<?php echo $id_tickets ?>">
                                จ่าย
                            </button>
                        </td>
                        <td>
                            <a href="cancel.php?id_user=<?php echo $id_user ?>&name_user=<?php echo $name_user ?>&id_tickets=<?php echo $id_tickets ?>">
                                <button type="button" class="btn btn-outline-secondary width">ยกเลิก</button>
                            </a>
                        </td>
                    </form>
                </tr>
                <?php }} ?>
            </tbody>
        </table>
        <table class="table table-striped container tab-pane fade" id="pay">
            <thead>
                <tr>
                    <th style=" width: 20%;">ชื่อคอนเสิร์ต</th>
                    <th style=" width: 10%;">โซนที่สั่ง</th>
                    <th style=" width: 10%;">ที่นั่ง</th>
                    <th style=" width: 10%;">ราคาตั๋ว</th>
                    <th style=" width: 10%;">วันที่ชำระ</th>
                    <th style=" width: 10%;"> </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql="SELECT * FROM con,tickets WHERE tickets.id_con = con.id_con AND tickets.id_user='$id_user' 
                    AND tickets.payday!='$0000-00-00'";
                    $result=$con->query($sql);
                    if ($result->num_rows > 0) {
                        while($row=$result->fetch_assoc()){
                            $id_con = $row['id_con'];
                            $namecon = $row['name'];
                            $zone = $row['zone'];
                            $seat = $row['seat'];
                            $price = $row['price'];
                            $payday = $row['payday'];
                ?>
                <tr>
                    <td class="p-3 pb-0"><?php echo $namecon ?></td>
                    <td class="p-3 pb-0"><?php echo $zone ?></td>
                    <td class="p-3 pb-0"><?php echo $seat ?></td>
                    <td class="p-3 pb-0"><?php echo $price ?></td>
                    <td class="p-3 pb-0"><?php echo $payday ?></td>
                    <td class="p-3 pb-0">
                        <p class="text-success">ชำระเงินแล้ว</p>
                    </td>
                </tr>
                <?php }} ?>
            </tbody>
        </table>
    </div>
    <!-- tap -->
</div>

<!-- The Modal Pay -->
<div class="modal" id="PayTicket<?php echo $id_tickets ?>">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><?php echo $id_tickets ?> : ชำระเงิน</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                กรุณาตรวจสอบข้อมูลก่อนชำระเงิน
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">ยกเลิก</button>
                <a href="pay.php?id_user=<?php echo $id_user ?>&name_user=<?php echo $name_user ?>&id_tickets=<?php echo $id_tickets ?>">
                    <button type="button submit" class="btn btn-primary" data-bs-dismiss="modal">
                        ยืนยัน
                    </button>
                </a>
                
            </div>
        </div>
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
