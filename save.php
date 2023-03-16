<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("db.php");

if (isset($_POST['save'])){
    $nombre = $_POST['nombre'];
    $referencia = $_POST['referencia'];
    $precio = $_POST['precio'];
    $peso = $_POST['peso'];
    $categoria = $_POST['categoria'];
    $stock = $_POST['stock'];


    $query = "INSERT INTO `productos` (`nombre`, `referencia`, `precio`, `peso`, `categoria`, `stock`) VALUES ('$nombre', '$referencia', '$precio', '$peso', '$categoria', '$stock')";
    mysqli_query($conn, $query) or die(mysqli_error($conn));

    $_SESSION['message'] = "Producto guardado!!";
    $_SESSION['message_type'] = "success";

    header("Location: todos.php");
}
?>
