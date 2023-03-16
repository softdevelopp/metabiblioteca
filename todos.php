<?php include("db.php") ?>

<?php include("includes/header.php") ?>

<div class="row justify-content-center">
    <div class="col-auto" style="padding-top: 15px;">
        <?php if (isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php session_unset();
        } ?>
        <table class="table table-bordered table-striped table-responsive">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Referencia</th>
                    <th>Precio</th>
                    <th>Peso</th>
                    <th>Categoría</th>
                    <th>Stock</th>
                    <th>Fecha de Creación</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM `productos`";
                $productos = mysqli_query($conn, $query);

                while ($product = mysqli_fetch_array($productos)) { ?>
                    <tr>
                        <td><?php echo $product['id'] ?></td>
                        <td><?php echo $product['nombre'] ?></td>
                        <td><?php echo $product['referencia'] ?></td>
                        <td><?php echo $product['precio'] ?></td>
                        <td><?php echo $product['peso'] ?></td>
                        <td><?php echo $product['categoria'] ?></td>
                        <td><?php echo $product['stock'] ?></td>
                        <td><?php echo $product['fecha'] ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $product['id'] ?>" class="btn btn-info">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a href="delete.php?id=<?php echo $product['id'] ?>" class="btn btn-danger">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include("includes/footer.php") ?>