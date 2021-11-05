<?php 

include('../dbConnection.php');

if(isset($_POST['usuario']) || isset($_POST['senha'])) {
  if(strlen($_POST['usuario']) == 0) {
    echo '<div>Campo de usuário não preenchido</div>';
  } else if(strlen($_POST['senha']) == 0) {
    echo '<div>Campo de senha não preenchido</div>';
  } else {
    $user = $mysqli->real_escape_string($_POST['usuario']);
    $password = $mysqli->real_escape_string($_POST['senha']);

    $check = "SELECT * FROM usuarios WHERE usuario = '$user'";
    $sql_query = $mysqli->query($check) or die("Error while checking DataBase !!!" . $mysqli->error);

    $usuario = $sql_query->fetch_assoc();

    if(password_verify($password, $usuario['senha'])) {
      echo("Logged in Successfully");

      if(!isset($_SESSION)) {
        session_start();
      }

      $_SESSION['id'] = $usuario['id'];
      $_SESSION['nome'] = $usuario['nome'];
      $_SESSION['usuario'] = $usuario['usuario'];

      header('Location: ../home.php');
    } else  {
        echo("<script>alert('Usuário ou Senha Incorreto(s)!') </script>");
    }
  } 
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="login.css" />
    <link rel="shortcut icon" href="../favicon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Login</title>
  </head>
  <body>
    <div class="container">
      <div >
        <img src="login.gif" />
      </div>

      <div class="principal">
        <div class="login">
          <div>
            <h1 id="titulo">LOGIN</h1>
            <br />
          </div>
          <form action="" method="POST">
              <div class="campo">
                <label for="Usuario"><strong>Usuário</strong></label>
                <input type="text" name="usuario" id="usuario" required />
              </div>

              <div class="campo">
                <label for Senha><strong>Senha</strong></label>
                <input type="password" name="senha" id="senha" required />
              </div>
              <input class="botao login-btn" type="submit" value="Entrar" />
          </form>
        </div>
        <div class="redirect2register">
          Não possui uma conta ? 
         <a href="../Cadastro/formulario.php"><input class="botao" id="redirect-btn" type="submit" value="Registrar" /></a>
        </div>
      </div>
    </div>
  </body>
</html>

