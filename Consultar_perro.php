<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Perritos</title>
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
            <a class="nav-link" aria-current="page" href="FormRegistrarPerro.html">Registrar Perro</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Consultar Perro</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="FormRegistrarHistoria.html">Registrar Historia</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="FormConsultarHistoria.html">Consultar Historia</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="FormPagarConsulta.html">Pagar Consulta</a>
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
        $conn = mysqli_connect("localhost", "root","", "relocadb");
        if (!$conn) {
            die("Error de conexion: " . mysqli_connect_error());
        }
        //(nombre de la base de datos, $enlace) mysql_select_db("RelocaDB",$link);
        //capturando datos
        $v2 = $_REQUEST['Nombre'];
        //conuslta SQL
        $sql = "select * from Perro where Nombre like '".$v2."'";
        $result = mysqli_query($conn, $sql);
        //cuantos reultados hay en la busqueda
        $num_resultados = mysqli_num_rows($result);
        echo "<p>Número de perros encontrados: ".$num_resultados."</p><br>";
        //mostrando informacion de los perros y detalle
        for ($i=0; $i <$num_resultados; $i++) {
            $row = mysqli_fetch_array($result); //echo ($i+1);
            echo " <p>DNI: ".$row["DNI"];
            echo " </br><p>Nombre: ".$row["Nombre"];
            echo " </br><p>Raza: ".$row["Raza"];
            echo " </br><p>Género: ";
            if($row["Genero"]==0)
                echo "Hembra ";
            else
                echo "Macho ";
            echo " </br><p>Nació en: ".$row["FechaNacimiento"];
            echo " <br><p>Foto: ";
            echo '</br><img src="'.$row["Foto"].'" width="300" height="auto">';
        }
        ?>
        <a href="FormConsultarPerro.html"><center><button class="boton">VOLVER</button></center></a>
    </section>
    
</body>
</html>