<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.: Formulario :.</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="jquery/jquery-3.7.1.min.js"></script>
    <script src="funciones.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
        <img src="icons/bootstrap-logo.svg" alt="" width="30" height="24">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Alumno</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Profesor</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            </div>
        </div>
    </nav>

    <h1>Listado de alumnos</h1>
    <a href="views/registro_alumno.php" class="btn btn-success">Agregar Nuevo</a>
    <?php
        include 'db/db.php';

        $sql = "SELECT * FROM alumno";
        $result = mysqli_query($db, $sql);

    ?>
    <table border="1">
        <tr>
            <td>ID</td>
            <td>Nombre</td>
            <td>Apellido</td>
            <td>Curso</td>
            <td>Habilitado</td>
            <td colspan="2">Acción</td>
        </tr>
        <?php
            while($row = mysqli_fetch_assoc($result)){
                echo "
                    <tr>
                        <td>$row[id]</td>
                        <td>$row[nombre]</td>
                        <td>$row[apellido]</td>
                        <td>$row[curso]</td>
                        <td>$row[habilitado]</td>
                        <td><a href='views/editar_alumno.php?id=$row[id]' class='btn btn-warning'><img src='icons/pencil-solid.svg'></a></td>
                        <td><button class='btn btn-danger open-modal' data-id=$row[id] data-bs-toggle='modal' 
                        data-bs-target='#exampleModal'><img src='icons/trash-solid.svg'></button></td>
                    </tr>
                    ";
            }
        ?>
    </table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <!-- <form method="post"> -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿Desea eliminar?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" method="post">
                    <input type="text" class="form-control" name="deleteId" id="deleteId" disabled>
                    <button type="submit" class="btn btn-primary" name="save" onclick="deleteRecord()">Guardar cambios</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        <!-- </form> -->
    </div>
  </div>
</div>
<!-- Modal -->

<?php 
    if(isset($_POST["save"]) && isset($_POST["valId"])){
        $id = $_POST["valId"];

        echo '<script>alert("Eliminado exitosamente")</script>';
    }

?>
</body>
</html>
