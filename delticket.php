<?php
@session_start();
include('connection.php');
$id_admin = $_SESSION['id_admin'];
$id_tickets = $_GET['id_tickets'];
$id_con = $_GET['id_con'];

    $sql="DELETE FROM tickets WHERE id_tickets='$id_tickets'";
    if ($con->query($sql)===TRUE) {
        echo "<script>window.location.href='setingticket.php?id_admin=$id_admin&id_con=$id_con'</script>";
    }
?>