<?php
    session_start();

    if (isset($_POST['validar'])) {
        $_SESSION['userID'] = $_POST['userID'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['picture'] = $_POST['picture'];
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['accessToken'] = $_POST['accessToken'];

        exit("success");
    }
?>

<!DOCTYPE>
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <div class="container formulario">
    <br>
    <center><h1>REGISTRO</h1></center>
    <br>
    <center> 
      <form action="registrar.php" method="post">
        <div class="form-group">
          <img src="img/nombre.png" border="1"  width="50" height="40">
          <label class="col-xs-12" for="usuario"><h3>Nombre</h3></label>
          <div class="col-xs-10 col-xs-offset-1">
            <input type="text" name="realname" class="form-control Input" required placeholder="">
          </div>
        </div>
        <div class="form-group">
          <img src="img/usuario.png" border="1"  width="50" height="40">
          <label class="col-xs-12" for="password"><h3>Usuario</h3></label>
          <div class="col-xs-10 col-xs-offset-1">
            <input type="text" name="nick" class="form-control col-xs-12 Input" required placeholder="">
          </div>
        </div>
        <div class="form-group">
          <img src="img/pass.png" border="1"  width="50" height="40">
          <label class="col-xs-12" for="password"><h3>Contraseña</h3></label>
          <div class="col-xs-10 col-xs-offset-1">
            <input type="password" name="pass" class="form-control col-xs-12 Input" required placeholder="">
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary center-block btn-lg">Registrar</button>
          <button type="reset" class="btn center-block btn-lg"><a href="index.php">Volver</a></button>
          <button type="reset" class="btn btn-danger center-block btn-lg">Eliminar</button>
        </div>
      </form>
    </center>
  </div>

<?php
    if(isset($_POST['submit'])){
      require("registrar.php");
    }
  ?>


</body>
</html>




