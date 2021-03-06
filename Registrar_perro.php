<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Perritos</title>
    <!--Custom CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stylesRegistrarPerro.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Veterinaria Canevaro</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Registrar Perro</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="FormConsultarPerro.html">Consultar Perro</a>
          </li>
        </ul>
        <form class="d-flex" action="desconectar.php">
          <button class="btn btn-outline-success" type="submit">Cerrar Sesión</button>
        </form>
      </div>
    </div>
  </nav>
    <section class="form-register">

    <?php
    //conexion a la Base de datos (Servidor,usuario,password)
    $conn = mysqli_connect("localhost","root","","relocadb");
    if (!$conn) {
        die("Error de conexion: " . mysqli_connect_error());
    }
    //(nombre de la base de datos, $enlace) mysql_select_db("Relocadb",$link);
    //capturando datos
    $v1 = $_REQUEST['Codigo'];
    $v2 = $_REQUEST['Nombre'];
    $v3 = $_REQUEST['FechNac'];
    $v4 = $_REQUEST['Raza'];
    $v5 = $_REQUEST['Genero'];
    $nombreimg = $_FILES['Foto']['name'];
    $archivo = $_FILES['Foto']['tmp_name'];
    $v6 = "images"; //$_REQUEST['Foto']; //Foto

    $v6 = $v6."/".$nombreimg;
    move_uploaded_file($archivo,$v6);

    //conuslta SQL
    $sql = "INSERT INTO Perro (DNI, Nombre, Raza, Genero, FechaNacimiento, Foto) ";
    $sql .= "VALUES ('$v1', '$v2', '$v4', '$v5', '$v3', '$v6' )";
    if (mysqli_query($conn, $sql)) {
        echo "<p> Datos ingresados con éxito &#128512</p>";
    } else {
        echo "Vuelva a ingresar los datos." . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
    //Mensaje de conformidad
    ?>
    </section>
</body>
</html>