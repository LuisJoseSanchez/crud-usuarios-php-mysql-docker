<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Banca Turing</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="icons/font/bootstrap-icons.min.css">
</head>

<body>

  <?php
    $conexion = mysqli_connect("db", "root", "test", "banco");

    if (!isset($_POST["accion"])) {
      $_POST["accion"] = "";
    }

    if ($_POST["accion"] == "eliminar") {
      $borra = "DELETE FROM cliente WHERE dni=\"$_POST[dni]\"";
      mysqli_query($conexion, $borra);
    }

    if ($_POST["accion"] == "insertar") {
      $inserta = "INSERT INTO cliente VALUES (\"$_POST[dni]\", \"$_POST[nombre]\", \"$_POST[direccion]\", \"$_POST[telefono]\")";
      mysqli_query($conexion, $inserta);
    }

    if ($_POST["accion"] == "modificar") {
      $modifica = "UPDATE cliente SET dni=\"$_POST[dni]\", nombre=\"$_POST[nombre]\", direccion=\"$_POST[direccion]\", telefono=\"$_POST[telefono]\" WHERE dni=\"$_POST[dniAntiguo]\"";
      mysqli_query($conexion, $modifica);
    }

    $consulta = mysqli_query($conexion, "SELECT * FROM cliente");
  ?>

  <br>
  <div class="container">

    <div class="card">
      <h1 class="text-center">Banca Turing</h1>

      <table class="table table-striped">
        <tr>
          <th>DNI</th>
          <th>Nombre</th>
          <th>Dirección</th>
          <th>Teléfono</th>
          <th></th>
          <th></th>
        </tr>

        <?php
        while ($registro = mysqli_fetch_array($consulta)) {
        ?>
          <tr>
            <td><?= $registro['dni'] ?></td>
            <td><?= $registro['nombre'] ?></td>
            <td><?= $registro['direccion'] ?></td>
            <td><?= $registro['telefono'] ?></td>

            <!-- Botón para eliminar un cliente de la base de datos -->
            <td>
              <form action="index.php" method="post">
                <input type="hidden" name="accion" value="eliminar">
                <input type="hidden" name="dni" value="<?= $registro['dni'] ?>">
                <button type="submit" class="btn btn-danger">
                  <i class="bi bi-trash3"></i>
                  Eliminar
                </button>
              </form>
            </td>

            <!-- Botón para modificar datos de un cliente -->
            <td>
              <form action="modifica-cliente.php" method="post">
                <input type="hidden" name="dni" value="<?= $registro['dni'] ?>">
                <input type="hidden" name="nombre" value="<?= $registro['nombre'] ?>">
                <input type="hidden" name="direccion" value="<?= $registro['direccion'] ?>">
                <input type="hidden" name="telefono" value="<?= $registro['telefono'] ?>">
                <button type="submit" class="btn btn-primary">
                  <i class="bi bi-pencil"></i>
                  Modificar
                </button>
              </form>
            </td>
          </tr>
        <?php
        }
        ?>

        <form action="index.php" method="post">
          <input type="hidden" name="accion" value="insertar">
          <tr>
            <td><input type="text" name="dni" size="10" require></td>
            <td><input type="text" name="nombre"></td>
            <td><input type="text" name="direccion"></td>
            <td><input type="text" name="telefono" size="10"></td>
            <td>
              <button type="submit" class="btn btn-success">
                <i class="bi bi-floppy"></i>
                Añadir
              </button>
            </td>
            <td></td>
          </tr>
        </form>
      </table>
    </div>
  </div>

  <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>