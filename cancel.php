<?php
    @session_start();
    include('connection.php');
    $id_user = $_SESSION['id_user'];
    $id_tickets = $_GET['id_tickets'];
    $name_user = $_GET['name_user'];
    // pay
    $sql = "UPDATE tickets SET reserve='0' , id_user='0' WHERE id_tickets = '$id_tickets' ";
    if ($con->query($sql)===TRUE) {
        echo "<script>window.location.href='MyTicket.php?id_user=$id_user&name_user=$name_user'</script>";
    }else{
        echo "Error: ".$sql."<br>".$con->error;
    }
?>
