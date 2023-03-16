<?php
include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM `productos` WHERE `productos`.`id` = $id";
    $productos = mysqli_query($conn, $query);

    if (mysqli_num_rows($productos) == 1) {
        $row = mysqli_fetch_array($productos);
        $nombre = $row['nombre'];
        $referencia = $row['referencia'];
        $precio = $row['precio'];
        $peso = $row['peso'];
        $categoria = $row['categoria'];
        $stock = $row['stock'];
    }
    if (isset($_POST['actualizar'])) {
        $id = $_GET['id'];
        $nombre = $_POST['nombre'];
        $referencia = $_POST['referencia'];
        $precio = $_POST['precio'];
        $peso = $_POST['peso'];
        $categoria = $_POST['categoria'];
        $stock = $_POST['stock'];

        $query = "UPDATE `productos` set `nombre` = '$nombre', `referencia` = '$referencia', `precio` = '$precio', `peso` = '$peso', `categoria` = '$categoria', `stock` = '$stock' WHERE `productos`.`id` = $id";
        mysqli_query($conn, $query);
        $_SESSION['message'] = "Producto Actualizado!!";
        $_SESSION['message_type'] = "success";
        header("Location: todos.php");
    }
}
?>
<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto" style="padding-top: 15px;">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="nombre" value="<?php echo $nombre; ?>" class="form-control" placeholder="Actualiza el nombre">
                    </div>
                    <div class="form-group">
                        <input type="number" name="referencia" value="<?php echo $referencia; ?>" class="form-control" placeholder="Actualiza la referencia">
                    </div>
                    <div class="form-group">
                        <input type="number" name="precio" value="<?php echo $precio; ?>" class="form-control" placeholder="Actualiza el precio">
                    </div>
                    <div class="form-group">
                        <input type="number" name="peso" value="<?php echo $peso; ?>" class="form-control" placeholder="Actualiza el peso">
                    </div>
                    <div class="form-group">
                        <input type="text" name="categoria" value="<?php echo $categoria; ?>" class="form-control" placeholder="Actualiza la categoria">
                    </div>
                    <div class="form-group">
                        <input type="number" name="stock" value="<?php echo $stock; ?>" class="form-control" placeholder="Actualiza el stock">
                    </div>
                    <button class="btn btn-success" name="actualizar">
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php") ?>
