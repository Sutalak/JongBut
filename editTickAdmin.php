<?php
    @session_start();
    include('connection.php');
    $id_admin = $_SESSION['id_admin'];
    $id_tickets = $_GET['id_tickets'];
    $id_con = $_GET['id_con'];

    $sql = "SELECT * FROM con,tickets WHERE con.id_con=tickets.id_con AND tickets.id_tickets='$id_tickets'";
	$re=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($re);
    //_________Edit___________________________________
    if(isset($_POST["edittick"])) {
        // $id_con=$_POST['id_con'];
        $zone=$_POST['zone'];
        $seat=$_POST['seat'];
        $price=$_POST['price'];

        $sql="UPDATE tickets SET id_con='$id_con', zone='$zone', seat='$seat', price='$price', id_admin='$id_admin' WHERE id_tickets = '$id_tickets'";

        if ($con->query($sql)===TRUE) {
            echo "<script>window.location.href='setingticket.php?id_admin=$id_admin&id_con=$id_con'</script>";
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
<!-- Modal Logout_______________________________________________________________________________________________________ -->
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
                <a href="index.php"><button type="button" class="btn btn-primary" data-bs-dismiss="modal">ตกลง</button></a>
            </div>

        </div>
    </div>
</div>
<div class="modal-body shadow" style="margin: 8% 25% 0% 25%; padding: 3%; background-color: #fff; border-radius: 10px;">
    <form method="post" class="modal-body row">
        <h3>แก้ไขตั๋ว</h3><hr>
        <div class="row">
            <div class="col-6">
                <label for="id_con">ชื่อคอนเสิร์ต</label>
                <input type="text" class="form-control" value="<?php echo $row["id_con"]; ?>" name="id_con">
            </div>
            <div class="col-6">
                <label for="zone">โซน</label>
                <select class="form-select" id="zone" name="zone" value="<?php echo $row["zone"]; ?>">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                </select> 
            </div>
            <div class="col-6">
                <label for="seat">ที่นั่ง</label>
                <select class="form-select" name="seat">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                </select> 
            </div>
            <div class="col-6">
                <label for="price">ราคา</label>
                <input type="text" class="form-control" value="<?php echo $row["price"]; ?>" name="price">
            </div>
        </div>

        <div class="modal-footer" style="margin: 3% 0% 0% -3%;">
            <a class="btn" href="setingticket.php?id_admin=<?php echo $id_admin ?>&id_con=<?php echo $id_con ?>">
                <button type="button" class="btn btn-outline-danger">ยกเลิก</button>
            </a> 
            <button type="button submit" name="edittick" class="btn btn-danger">ตกลง</button>
        </div>
    </form> 
</div>
</body>
</html>