<?php 

include '../dbConnection.php';

if(isset($_POST['submit'])) { 
  $nome = $mysqli->real_escape_string($_POST['nome']);
  $sobrenome = $mysqli->real_escape_string($_POST["sobrenome"]);
  $email = $mysqli->real_escape_string($_POST['email']);
  $usuario = $mysqli->real_escape_string($_POST["usuario"]);
  $senha = password_hash($mysqli->real_escape_string($_POST["senha"]), PASSWORD_DEFAULT);

  $availabilityUser= "SELECT nome FROM usuarios WHERE usuario = '$usuario';";
  $availabilityEmail = "SELECT email FROM usuarios WHERE email = '$email';";

  $sql_query_user = $mysqli->query($availabilityUser) or die("Error while executing query for user" . $mysqli->error);
  $sql_query_email = $mysqli->query($availabilityEmail) or die("Error while executing query for email" . $mysqli->error);

  $numRows_user = $sql_query_user->num_rows;
  $numRows_email = $sql_query_email->num_rows;


  if($numRows_user == 0 && $numRows_email == 0) {
    $sql = "INSERT INTO usuarios(nome, sobrenome, email, usuario, senha) VALUES('$nome', '$sobrenome', '$email', '$usuario', '$senha');";
  
    $results = mysqli_query($mysqli, $sql);
  
    if(!$results) {
      echo "Error while inserting in DataBase !!! 💀 💀 💀 . $mysqli->error";
      die("⛔ ⛔ ⛔ ");
    } else {
       # Coletando ID do usuário para iniciar a sessão
      $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
      $sql_search = $mysqli->query($sql) or die("Error while checking DataBase !!!" . $mysqli->error);
      $user_data = $sql_search->fetch_assoc();

      if(!isset($_SESSION)) {
        session_start();
      }

      $_SESSION['id'] = $user_data['id'];
      $_SESSION['usuario'] = $user_data['usuario'];
      $_SESSION['nome'] = $user_data['nome'];
                            
      echo("<script> 
              window.location = '../home.php';
            </script>");
    }
  }
  else {
    if($numRows_user == 0) {
      echo("<script>alert('Este email já se encontra em uso!') </script>");
    } else {
      if($numRows_email == 0) {
        echo("<script>alert('Este nome de usuário já se encontra em uso!') </script>");
      } else {
        echo("<script>alert('Este email e usuário já se encontram em uso!') </script>");
      }
    }
  }

}
?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="formulario.css"
      media="screen"
    />
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <title>Cadastro</title>
  </head>

  <body>
    <div class="container">
      <div>
        <h1 id="titulo">Cadastro</h1>
        <br />
      </div>

      <form method="POST">
        <fieldset class="grupo">
          <div class="campo">
            <label for="nome"><strong>Nome</strong></label>
            <input type="text" name="nome" id="nome" required />
          </div>

          <div class="campo">
            <label for="sobrenome"><strong>Sobrenome</strong></label>
            <input type="text" name="sobrenome" id="sobrenome" required />
          </div>
        </fieldset>

        <div class="campo">
          <label for="email"><strong>Email</strong></label>
          <input type="email" name="email" id="email" required />
        </div>

        <div class="campo">
          <label for="usuario"><strong>Usuário</strong></label>
          <input type="text" name="usuario" id="usuario" required />
        </div>

        <div class="campo"  style="margin-bottom: 0">
          <label for="senha"><strong>Senha</strong></label>
          <input type="password" name="senha" id="senha" required />
        </div>

        <button class="botao" type="submit" name="submit" >Enviar</button>
      </form>
    </div>
  </body>
</html>
