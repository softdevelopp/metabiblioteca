<?php include("db.php") ?>

<?php include("includes/header.php") ?>

<div class="container p-4">
  <div class="row">
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

        <form action="./save.php" method="POST">
          <div class="form-group">
            <input type="text" name="nombre" class="form-control" placeholder="Nombre del producto" autofocus required>
          </div>

          <div class="form-group">
            <input type="number" name="referencia" class="form-control" placeholder="Referencia del producto" min="1" required>
          </div>

          <div class="form-group">
            <input type="number" name="precio" class="form-control" placeholder="Precio del producto" min="1" required>
          </div>

          <div class="form-group">
            <input type="number" name="peso" class="form-control" placeholder="Peso del producto" min="1" required>
          </div>

          <div class="form-group">
            <input type="text" name="categoria" class="form-control" placeholder="Categoria del producto" required>
          </div>

          <div class="form-group">
            <input type="number" name="stock" class="form-control" placeholder="Stock del producto" min="1" required>
          </div>
          <input type="submit" class="btn btn-success btn-block" name="save" value="Guardar">
        </form>
      </div>
    </div>
  </div>
</div>

<?php include("includes/footer.php") ?>