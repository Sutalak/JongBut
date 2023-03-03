<?php   
    @session_start();
    include('connection.php');
    $id_admin = $_SESSION['id_admin'];
    $id_con = $_GET['id_con'];

    $sql ="SELECT * FROM con WHERE id_con='$id_con'";
	$re=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($re);
        $name=$row['name'];

    // _________ Add __________
    if(isset($_POST["add"])) {
        $id_tickets=$_POST['id_tickets'];
        $id_con=$_POST['id_con'];
        $zone=$_POST['zone'];
        $seat=$_POST['seat'];
        $price=$_POST['price'];

        $sql="INSERT INTO tickets (id_tickets, id_con, zone, seat, price, id_admin) VALUES ('$id_tickets', '$id_con', '$zone', '$seat', '$price', '$id_admin')";
        if ($con->query($sql)===TRUE) {
            echo "<script>window.location.href='setingticket.php?id_admin=$id_admin&id_con=$id_con'</script>";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add</title>
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
<div class="modal-body shadow row" style="margin: 6% 25% 0% 25%; padding: 4%; background-color: #fff; border-radius: 10px;">
    <div class="col-6">
        <h3>จัดการตั๋ว <?php echo $name ?></h3>
    </div>
    <div class="col-6" align="right">
        <button class="btn-SlateBlue" style="width: 40%;" data-bs-toggle="modal" data-bs-target="#add">
            Add +
        </button>
    </div>
    <hr>
    <table class="table table-striped">
    <thead>
        <tr>
            <th>id_tickets</th>
            <th>id_con</th>
            <th>โซน</th>
            <th>ที่นั่ง</th>
            <th>ราคา</th>
            <th style="width: 10%;"></th>
            <th style="width: 10%;"></th>
        </tr>
    </thead>

    <tbody>
        <?php
            $sql="SELECT * FROM tickets WHERE id_con='$id_con'";
            $result=$con->query($sql);
            if ($result->num_rows > 0) {
                while($row=$result->fetch_assoc()){
                    $id_tickets=$row['id_tickets'];
                    $id_con=$row['id_con'];
                    $zone=$row['zone'];
                    $seat=$row['seat'];
                    $price=$row['price'];
        ?>
        <tr>
            <td><?php echo $id_tickets?></td>
            <td><?php echo $id_con?></td>
            <td><?php echo $zone?></td>
            <td><?php echo $seat?></td>
            <td><?php echo $price?></td>
            <td style="width: 10%;">
            <a class="btn btn-outline-light" href="editTickAdmin.php?id_admin=<?php echo $id_admin ?>&id_tickets=<?php echo $id_tickets ?>&id_con=<?php echo $id_con ?>"
                style="background-color: #B85FFF; width: 100%;" type="button">แก้ไข</a>
            </td>
            <td style="width: 10%;">
                <button data-bs-toggle="modal" data-bs-target="#del<?php echo $id_tickets ?>" class="btn btn-outline-dark" style="width: 100%;">
                    Del
                </button>
            </td>
        </tr>
        <div id="del<?php echo $id_tickets ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
                    <div class="modal-content">
                        
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">ลบรายการคอนเสิร์ต</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <p>คุณต้องการลบ <?php echo $id_tickets ?> ใช่หรือไม่</p>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">ยกเลิก</button>
                            <a href="delticket.php?id_admin=<?php echo $id_admin ?>&id_tickets=<?php echo $id_tickets ?>&id_con=<?php echo $id_con ?>">
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
    </tbody>

    </table>
</div>
<!-- ___________ Add ___________ -->
<div id="add" class="modal fade" role="dialog">
    <form method="post">
        <div class="modal-dialog">
            <div class="modal-content row">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">เพิ่มตั๋ว</h4>
                </div>
                <!-- Modal body -->
                <div class="modal-body row">
                    <div class="col-6">
                      <label for="id_con">รหัสคอนเสิร์ต</label>
                      <input type="text" class="form-control" value="<?php echo $id_con ?>" name="id_con">
                    </div>
                    <div class="col-6">
                        <label for="zone">โซน</label>
                        <select class="form-select" name="zone">
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
                      <input type="text" class="form-control" placeholder="Enter price" name="price">
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">ยกเลิก</button>
                    <button type="button submit" name="add" class="btn btn-danger">ตกลง</button>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>
