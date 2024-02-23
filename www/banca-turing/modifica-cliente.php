<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Banca Turing - Modifica cliente</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="icons/font/bootstrap-icons.min.css">
  <style>
    .aire {
      padding: 10px 60px 10px 60px;
    }

    a {
      text-decoration: none;
      color: white;
    }
  </style>
</head>

<body>
  <?php
    $dni = $_POST["dni"];
    $nombre = $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
  ?>
  <br>
  <div class="container">

    <div class="card">
      <h1 class="text-center">Banca Turing - Modifica cliente</h1>

      <form action="index.php" method="post">
        <input type="hidden" name="accion" value="modificar">
        <input type="hidden" name="dniAntiguo" value="<?= $dni ?>">
        <div class="mb-3 aire">
          <label for="dni" class="form-label">DNI</label>
          <input
            type="text"
            class="form-control"
            id="dni"
            name="dni"
            value="<?= $dni ?>"
            size="10">
        </div>

        <div class="mb-3 aire">
          <label for="nombre" class="form-label">Nombre</label>
          <input
            type="text"
            class="form-control"
            id="nombre"
            name="nombre"
            value="<?= $nombre ?>">
        </div>

        <div class="mb-3 aire">
          <label for="direccion" class="form-label">Dirección</label>
          <input
            type="text"
            class="form-control"
            id="direccion"
            name="direccion"
            value="<?= $direccion ?>">
        </div>

        <div class="mb-3 aire">
          <label for="telefono" class="form-label">Teléfono</label>
          <input
            type="tel"
            class="form-control"
            id="telefono"
            name="telefono"
            value="<?= $telefono ?>">
        </div>

        <div class="mb-3 aire">
          <button type="submit" class="btn btn-success">
            Aceptar
          </button>

          <button class="btn btn-danger">
            <a href="index.php">
              Cancelar
            </a>
          </button>
          
        <div>
      </form>

    </div>
  </div>

  <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>