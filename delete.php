<?php
    include("db.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM `productos` WHERE `productos`.`id` = $id";
        mysqli_query($conn, $query) or die(mysqli_error($conn));
    }

    $_SESSION['message'] = "Producto Eliminado!!";
    $_SESSION['message_type'] = "danger";

    header("Location: todos.php");
?>