<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("db.php");

if (isset($_POST['vender'])) {
    $id_producto = $_POST['id_producto'];
    $cantidad = $_POST['cantidad'];


    $query = "SELECT * FROM `productos` WHERE `productos`.`id` = $id_producto";
    $producto = mysqli_query($conn, $query);
    if (!$producto) {
        echo mysqli_error($conn);
        die();
    }
    if (mysqli_num_rows($producto) == 1) {
        $row = mysqli_fetch_array($producto);
        $stock = $row['stock'];
        $nombre = $row['nombre'];
        $subt = $stock - $cantidad;
        if ($subt < 0) {
            $_SESSION['message'] = "No es posible realizar la venta";
            $_SESSION['message_type'] = "danger";
            header("Location: ventas.php");
        } else {
            //Actualizar stock en productos
            $query = "UPDATE `productos` set `stock` = '$subt' WHERE `productos`.`id` = $id_producto";
            mysqli_query($conn, $query);

            //Comprobar si se ha vendido antes el producto
            $query = "SELECT * FROM `ventas` WHERE `ventas`.`id` = $id_producto";
            $venta = mysqli_query($conn, $query);
            if (mysqli_num_rows($venta) == 1) {
                $query2 = "UPDATE `ventas` SET `count` = `count`+ $cantidad WHERE `ventas`.`id` = $id_producto";
                mysqli_query($conn, $query2);
            } else {
                $query2 = "INSERT INTO `ventas`(`id`, `nombre`, `count`) VALUES ('$id_producto', '$nombre', '$cantidad')";
                mysqli_query($conn, $query2);
            }

            $_SESSION['message'] = "Venta realizada con éxito!!";
            $_SESSION['message_type'] = "success";
            header("Location: todos.php");
        }
    } else {
        $_SESSION['message'] = "No es posible realizar la venta";
        $_SESSION['message_type'] = "danger";
        header("Location: ventas.php");
    }
}
