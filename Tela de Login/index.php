<?php 

include('login.php');

if(isset($_POST['usuario']) || isset($_POST['senha'])) {
  if(strlen($_POST['usuario']) == 0) {
    echo '<div>Campo de usuário não preenchido</div>';
  } else if(strlen($_POST['senha']) == 0) {
    echo '<div>Campo de senha não preenchido</div>';
  } else {
    $user = $mysqli->real_escape_string($_POST['usuario']);
    $password = $mysqli->real_escape_string($_POST['senha']);

    $check = "SELECT * FROM usuarios WHERE usuario = '$user' AND senha = '$password'";
    $sql_query = $mysqli->query($check) or die("Error while executing query" . $mysqli->error);

    # Checking if number possible results equals 1
    $qtd = $sql_query->num_rows;

    if($qtd == 1) {
      $usuario = $sql_query->fetch_assoc();
      echo("Logged in Successfully");

      if(!isset($_SESSION)) {
        session_start();
      }

      $_SESSION['id'] = $usuario['id'];
      $_SESSION['nome'] = $usuario['none'];

      header('Location: home.php');
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
    <link rel="stylesheet" type="text/css" href="Login.css" />
    <link rel="shortcut icon" type="imagex/png" href="hacker.png" />
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
              <input class="botao login-btn" type="submit" value="Avançar" />
          </form>
        </div>
        <div class="redirect2register">
          Não possui uma conta ? 
         <a href="../Tela de Cadastro/register.php"><input class="botao" id="redirect-btn" type="submit" value="Registrar" /></a>
        </div>
      </div>
    </div>
  </body>
</html>

