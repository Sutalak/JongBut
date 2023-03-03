<?php
    @session_start();
    include('connection.php');
    $id_admin = $_SESSION['id_admin'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>listconAdmin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/css.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<?php
    $sql="SELECT * FROM con";
    $result=$con->query($sql);
    if ($result->num_rows > 0) {
        while($row=$result->fetch_assoc()){
            $id_con=$row['id_con'];
?>
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
<!-- //Bar_______________________________________________________________________________________________________ -->

    <div class="row" style="padding: 8% 5% 5% 5%; margin: 0;">
<!-- Name Page_______________________________________________________________________________________________________ -->
        <div class="col-9">
            <h2>จัดการคอนเสิร์ต</h2>
        </div>
<!--  dropdrow _______________________________________________________________________________________________________ -->
        <div class="row col-3" align="right">
<!-- Add_______________________________________________________________________________________________________ -->
            <button data-bs-toggle="modal" data-bs-target="#add" class="btn btn-outline-light" style="background-color: #B85FFF; width: 80%;">
                + Add
            </button>
        </div>
<!--  search _______________________________________________________________________________________________________ -->
        <div class="col-3" style="margin-top: 3%;">
            <form method="post" class="input-group" style="width: 80%;">
                <input type="text" name="txtsearch" class="form-control" placeholder="ค้นหาชื่อคอนเสิร์ต" />
                <button name="search" class="btn btn-outline-light" style="background-color: #B85FFF;">ค้นหา</button>
            </form>
        </div>
<!-- list menu_______________________________________________________________________________________________________ -->

        <div class="col-9" style="margin-top: 2%;">
            <div class="row">
                    <?php
                    if (isset($_POST['search'])) {
                        $sql = "SELECT * FROM con WHERE name like '%".trim($_POST['txtsearch'])."%' or name like '%".trim($_POST['txtsearch'])."%' " ;
                    }else{
                        $sql = "SELECT * FROM con";
                    }
                    $result=$con->query($sql);
                    if ($result->num_rows > 0) {
                        while($row=$result->fetch_assoc()){  
                            $id_con=$row['id_con'];     
                            $name=$row['name'];
                            $location=$row['location'];
                            $saleday=$row['saleday'];
                            $showday=$row['showday'];
                            $showtime=$row['showtime'];
                            $description=$row['description'];
                            $img=$row['img'];
                            $status=$row['status'];
                ?>
                <!-- เริ่มตั้งแต่ตรงนี้______________________________________________________________________________________ -->
                <div class="card col-3 m-3">
                    <img class="card-img-top" src="img/<?php echo $img ?>"
                    alt="Card image">
                    <div class="card-body">
                        <h4 class="card-title">[<?php echo $id_con ?>]<?php echo $name ?></h4>
                        <p class="card-title">วันจำหน่าย : <?php echo $saleday?></p>
                        <p class="card-text">วันแสดง : <?php echo $showday?></p>
                        <a class="btn btn-outline-light" href="editAdmin.php?id_admin=<?php echo $id_admin ?>&id_con=<?php echo $id_con ?>"
                        style="background-color: #B85FFF;" type="button">แก้ไข</a>
                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#del<?php echo $id_con ?>">ลบ</a>
                    </div>
                </div>
                <!-- ถึงตรงนี้ ___________________________________________________________________________________________ -->
                <!-- Modal del  ___________________________________________________________________________________________ -->
            <div id="del<?php echo $id_con ?>" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">ลบรายการคอนเสิร์ต</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <p>คุณต้องการลบ <?php echo $name?> ใช่หรือไม่</p>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">ยกเลิก</button>
                            <a href="delcon.php?id_admin=<?php echo $id_admin ?>&id_con=<?php echo $id_con ?>">
                                <button type="button" class="btn btn-danger">ลบ</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
                <?php
                        }
                    }
                ?>
            </div>
        </div>
<!-- /list menu_______________________________________________________________________________________________________ -->
    </div>
<?php
//-----------Add--------------
    
    if(isset($_POST["submit"])) {
        $fileinfo=PATHINFO($_FILES['image']['name']); //fileinfo เก็บ __ PATHINFO ประเภทข้อมูลเอาไว้เก็บรูป ___ 
        $newFilename=$fileinfo['filename'].".".$fileinfo['extension']; //newFilename สร้าง fileinfo ตั้งชื่อให้ภาพ extension รับนามสกุล จะได้ filename_time.jpg
        move_uploaded_file($_FILES['image']['tmp_name'], "img/".$newFilename); //move_uploaded_file ย้ายรูปไป img/conimg/
        $loimage=$newFilename;

        $id_con=$_POST['id_con'];
        $name=$_POST['name'];
        $location=$_POST['location'];
        $saleday=$_POST['saleday'];
        $showday=$_POST['showday'];
        $showtime=$_POST['showtime'];
        $description=$_POST['description'];
        $status=$_POST['status'];

        $sql="INSERT INTO con (id_con,name,location,saleday,showday,showtime,description,img,id_admin,status) VALUES ('$id_con','$name',
        '$location','$saleday','$showday','$showtime','$description','$newFilename','$id_admin','$status')";

        if ($con->query($sql)===TRUE) {
            echo "<script>window.location.href='listconAdmin.php?id_admin=$id_admin'</script>";
        }                                               
    }
?>

<!-- /Modal Add_______________________________________________________________________________________________________ -->
<div id="add" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

     <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">เพิ่มคอนเสิร์ต</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="listconAdmin.php" method="post" enctype="multipart/form-data" class="modal-body row" style="padding: 5%;">
                    <div class="col-6">
                        <label for="name">ชื่อคอนเสิร์ต</label>
                        <input type="text" class="form-control" placeholder="name" name="name">
                    </div>
                    <div class="col-6">
                      <label for="location">สถานที่</label>
                      <input type="text" class="form-control" placeholder="Enter location" name="location">
                    </div>
                    <div class="col-6">
                      <label for="saleday">วันจำหน่าย</label>
                      <input type="date" class="form-control" placeholder="Enter saleday" name="saleday">
                    </div>
                    <div class="col-6">
                      <label for="showday">วันแสดง</label>
                      <input type="date" class="form-control" placeholder="Enter showday" name="showday">
                    </div>
                    <div class="col-6">
                      <label for="showtime">เวลาแสดง</label>
                      <input type="time" class="form-control" placeholder="Enter showtime" name="showtime">
                    </div>
                    <div class="col-6">
                      <label for="description">คำอธิบาย</label>
                      <input type="text" class="form-control" placeholder="Enter description" name="description">
                    </div>
                    <div class="col-6">
                      <label for="img">รูป</label>
                      <input class="form-control" type="file" name="image" id="fileToUpdate">
                    </div>
                    <div class="col-6">
                        <label for="status">สถานะ</label>
                        <select class="form-select" name="status">
                            <option value="1">ยังไม่หมดอายุ</option>
                        </select> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">ยกเลิก</button>
                        <button type="button submit" name="submit" class="btn btn-primary" data-bs-dismiss="modal">Add Ticket</button>
                    </div>
            </form>
    </div>
</div>

<?php
    }
}
?>
</body>
</html>