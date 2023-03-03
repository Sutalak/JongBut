<?php
    @session_start();
    include('connection.php');
    $id_admin = $_SESSION['id_admin'];
    $id_con = $_GET['id_con'];

    $sql ="SELECT * FROM con WHERE id_con='$id_con'";
	$re=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($re);
    //_________Edit___________________________________
    if(isset($_POST["edit"])) {
        // $fileinfo=PATHINFO($_FILES['image']['name']); 
        // $newFilename=$fileinfo['filename'].".".$fileinfo['extension']; 
        // move_uploaded_file($_FILES['image']['tmp_name'], "img/".$newFilename); 
        // $loimage=$newFilename;

        // $id_con=$_GET['id_con'];
        $name=$_POST['name'];
        $location=$_POST['location'];
        $saleday=$_POST['saleday'];
        $showday=$_POST['showday'];
        $showtime=$_POST['showtime'];
        // $img=$_POST['image'];
        $description=$_POST['description'];
        $status=$_POST['status'];
// img='$img',
        $sql="UPDATE con SET name='$name', location='$location', saleday='$saleday', showday='$showday', showtime='$showtime', description='$description'
        , status='$status' WHERE id_con='$id_con'";

        if ($con->query($sql)===TRUE) {
            echo "<script>window.location.href='listconAdmin.php?id_admin=$id_admin'</script>";
        }                                                
    }
?>
<!DOCTYPE html>
<html>
<head>
  <title>edit</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/css.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background-color: #f1f1f1;">
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
<form method="post" class="modal-body shadow row" style="margin: 8% 25% 0% 25%; padding: 5%; background-color: #fff; border-radius: 10px;">
    <h3>แก้ไขคอนเสิร์ต</h3><hr>
    <div class="col-6">
        <label for="name">ชื่อคอนเสิร์ต</label>
        <input type="text" class="form-control" value="<?php echo $row["name"]; ?>" name="name">
    </div>
    <div class="col-6">
        <label for="location">สถานที่</label>
        <input type="text" class="form-control" value="<?php echo $row["location"]; ?>" name="location">
    </div>
    <div class="col-6">
        <label for="saleday">วันจำหน่าย</label>
        <input type="date" class="form-control" value="<?php echo $row["saleday"]; ?>" name="saleday">
    </div>
    <div class="col-6">
        <label for="showday">วันแสดง</label>
        <input type="date" class="form-control" value="<?php echo $row["showday"]; ?>" name="showday">
    </div>
    <div class="col-6">
        <label for="showtime">เวลาแสดง</label>
        <input type="time" class="form-control" value="<?php echo $row["showtime"]; ?>" name="showtime">
    </div>
    <div class="col-6">
        <label for="description">คำอธิบาย</label>
        <input type="text" class="form-control" value="<?php echo $row["description"]; ?>" name="description">
    </div>
    <!-- <div class="col-6">
        <label for="img">รูป</label>
        <input class="form-control" type="file" name="image" id="fileToUpdate">
    </div> -->
    <div class="col-6">
        <label for="status">สถานะ</label>
        <select class="form-select" name="status">
            <option value="1">ยังไม่หมดอายุ</option>
            <option value="0">หมดอายุแล้ว</option>
        </select> 
    </div>
    <div style="margin-top: 5%;" align="right">
        <a href="listconAdmin.php?id_admin=<?php echo $id_admin ?>">
            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">ยกเลิก</button> 
        </a>
        <button type="button submit" name="edit" class="btn btn-primary" data-bs-dismiss="modal">ตกลง</button>
    </div>
</form>

</body>
</html>