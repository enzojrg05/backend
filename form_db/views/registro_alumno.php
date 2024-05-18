<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.: Registro de Alumno :.</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../funciones.js"></script>
</head>
<body>
    <form action="" method="post">
        <h1>Agregar Nuevo Alumno</h1>
        <div class="row">
            <div class="col">
                <label for="id">Id</label>
                <input type="text" name="id" id="id" class="form-control" required>
            </div>
            <div class="col">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" id="apellido" class="form-control" required>
            </div>
            <div class="col">
                <label for="curso">Curso</label>
                <input type="text" name="curso" id="curso" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="enable">¿Está habilitado?</label>
                <input type="checkbox" name="enable" id="enable">
            </div>
        </div>
        <div class="d-flex flex-row">
            <div class="p-2">
                <button type="submit" class="btn btn-success boton">Agregar</button>
            </div>
            <div class="p-2">
                <button class="btn btn-secondary" onclick="redirectToPage()">Cancelar</button>
            </div>
        </div>
    </form>
    <?php

        if(isset($_POST["id"]) && isset($_POST["nombre"])
        && isset($_POST["apellido"]) && isset($_POST["curso"])){
            $id = $_POST["id"];
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $curso = $_POST["curso"];
            $enable = isset($_POST["enable"]) ? 1 : 0; // Cambiado el manejo del checkbox

            include '../db/db.php';

            $sql = "INSERT INTO Alumno(id, nombre, apellido, curso, habilitado) 
                    VALUES($id,'$nombre','$apellido', '$curso', $enable)";

            try {
                $execute = mysqli_query($db, $sql);
                if($execute){
                    echo "<script>show('Nuevo registro creado exitosamente', 'success');</script>";
                    echo "
                            <script>
                                setTimeout(() => {
                                    redirectToPage();
                              }, '3500');
                            </script>
                    ";
                }
            } catch(Exception $e){
                echo "<script>show('¡Algo salió mal!', 'error');</script>";
            }
            $db->close();
        }
        
    ?>
</body>
</html>
