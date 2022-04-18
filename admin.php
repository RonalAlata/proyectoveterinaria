<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['user']) {
	header("Location:index.html");
}elseif ($_SESSION['rol']==2) {
	header("Location:FormRegistrarPerro.html");
}
?>



<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/styles.css">
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
					<a class="nav-link active" aria-current="page" href="#">Administrar Usuarios</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" aria-current="page" href="adminConsultaHistoria.html">Consultar Historia</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" aria-current="page" href="adminConsultaVeterinario.html">Consultar Veterinario</a>
				</li>
			</ul>
            <form class="d-flex" action="desconectar.php">
              <button class="btn btn-outline-success" type="submit">Cerrar Sesión</button>
            </form>
          </div>
        </div>
    </nav>
	<div class="container2">
		<div class="row">
			<div class="span12">
				<div class="caption">
					<div class="well well-small">
						<br>
					<div style="text-align: center;"><h2>Tabla de usuarios registrados</h2>	</div><a href="desconectar.php"><center><button class="btn btn-primary">Cerrar Sesión</button></center></a>
					<hr class="soft"/>
					<div style="text-align: center;"><h4>LISTA DE USUARIOS REGISTRADOS</h4></div>
						<div class="row-fluid">
									<center>

							<?php

								require("conexion.php");
								$sql=("SELECT * FROM login");
					
								$query=mysqli_query($mysqli,$sql);

								echo "<table border='5';>";
									echo "<tr class='warning'>";
										echo "<td>Usuario</td>";
										echo "<td>Contraseña</td>";
										echo "<td>Correo eletronico</td>";
										echo "<td>Contraseña del administrador</td>";
										echo "<td>Borrar cuenta</td>";
									echo "</tr>";

								
							?>
						
							<?php 
								while($arreglo=mysqli_fetch_array($query)){
									echo "<tr class='success'>";
										echo "<td>$arreglo[1]</td>";
										echo "<td>$arreglo[2]</td>";
										echo "<td>$arreglo[3]</td>";
										echo "<td>$arreglo[4]</td>";
										echo "<td><a href='admin.php?id=$arreglo[0]&idborrar=2'><img src='img/eliminar.png' class='img-rounded'/></a></td>";
									echo "</tr>";
								}

								echo "</table>";
								extract($_GET);
								if(@$idborrar==2){
									$sqlborrar="DELETE FROM login WHERE id=$id";
									$resborrar=mysqli_query($mysqli,$sqlborrar);
									echo '<script>alert("REGISTRO ELIMINADO")</script> ';
									echo "<script>location.href='admin.php'</script>";
								}
							?>
							</center>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>