<?php include("db.php") ?>

<?php include("includes/header.php") ?>

<div class="container p-4">
  <div class="col">
    <div class="col-md-4 mx-auto">
      <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
          <?= $_SESSION['message'] ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php session_unset();
      } ?>
      <div class="card card-body">

        <form action="./ventas_q.php" method="POST">
          <div class="form-group">
            <input type="number" name="id_producto" class="form-control" placeholder="id del producto" autofocus required>
          </div>

          <div class="form-group">
            <input type="number" name="cantidad" class="form-control" placeholder="cantidad" min="1" required>
          </div>

          <input type="submit" class="btn btn-success btn-block" name="vender" value="Vender">
        </form>
      </div>
    </div>
    <div class="col-md-7 mx-auto" style="margin-top: 15px;">
      <div class="card card-body">
        <?php
        //Sub consulta
        $query = mysqli_query($conn, "SELECT `nombre`, `stock` FROM `productos` WHERE stock=(SELECT MAX( stock ) FROM `productos`);");
        $row = mysqli_fetch_array($query);
        $maxStock = $row['stock'];
        $name = $row['nombre'];

        ?>
        <p class="text-center">Producto que más stock tiene = <strong><?php echo $name; ?></strong> con un total de : <strong><?php echo $maxStock; ?></strong></p>
        <?php
        $query = mysqli_query($conn, "SELECT `nombre`, `count` FROM `ventas` WHERE count=(SELECT MAX( count ) FROM `ventas`);");
        $row = mysqli_fetch_array($query);
        $maxStock = $row['count'];
        $name = $row['nombre'];

        ?>
        <p class="text-center">Producto más vendido = <strong><?php echo $name; ?></strong> con un total de : <strong><?php echo $maxStock; ?></strong></p>
      </div>
    </div>
  </div>
</div>
<?php include("includes/footer.php") ?>
