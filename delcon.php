<?php
@session_start();
include('connection.php');
$id_admin = $_SESSION['id_admin'];
$id_con = $_GET['id_con'];

    $sql="DELETE FROM con WHERE id_con='$id_con'";
    if ($con->query($sql)===TRUE) {
        echo "<script>window.location.href='listconAdmin.php?id_admin=$id_admin'</script>";
    }

?>