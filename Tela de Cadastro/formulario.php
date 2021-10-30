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
        <h1 id="titulo">Formulario de TI</h1>
        <p id="subtitulo">Complete suas informações</p>
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

        <div class="campo wrapper">
          <br />
          <label for="experiencia"
            ><strong
              >Por que você se interessa<br />
              pela área de TI ?</strong
            ></label
          >
          <input type="text" name="interesse" id="interesse" />
        </div>

        <div class="campo" style="align-items: center">
          <label for="senioridade"
            ><strong>Qual seria sua Senioridade</strong></label
          >
          <select id="senioridade" name="senioridade">
            <option selected disabled value="" >Selecione</option>
            <option>Júnior</option>
            <option>Pleno</option>
            <option>Sênior</option>
          </select>
        </div>


        <fieldset class="tech" name="tech">
        <div class="campo radio">
          <label>
            <strong
              >Como desenvolvedor, qual stack você<br />
              mais desenvolve ou prefere ?</strong
            >
          </label>
          <label>
            <input
              type="radio"
              name="devweb"
              value="frontend"
              checked
            />Front-end
          </label>
          <label>
            <input type="radio" name="devweb" value="backend" />Back-end
          </label>
          <label>
            <input type="radio" name="devweb" value="fullstack" />Fullstack
          </label>
        </div>
</fieldset>

        <fieldset class="tech" name="tech">
          <label><strong>Selecione as tecnologias que utiliza:</strong></label
          ><br /><br />
          <div id="check">
            <div class="techs">
              <input
                type="checkbox"
                id="tecnologia1"
                name="tech[]"
                value="HTML"
              />
              <label for="tecnologia1"> HTML</label>
              <input
                type="checkbox"
                id="tecnologia2"
                name="tech[]"
                value="CSS"
              />
              <label for="tecnologia2"> CSS</label>
              <input
                type="checkbox"
                id="tecnologia3"
                name="tech[]"
                value="JavaScript"
              />
              <label for="tecnologia3"> JavaScript</label>
              <input
                type="checkbox"
                id="tecnologia4"
                name="tech[]"
                value="PHP"
              />
              <label for="tecnologia4"> PHP</label><br />
              <input
                type="checkbox"
                id="tecnologia5"
                name="tech[]"
                value="C#"
              />
              <label for="tecnologia5"> C#</label>
              <input
                type="checkbox"
                id="tecnologia6"
                name="tech[]"
                value="Python"
              />
              <label for="tecnologia6"> Python</label>
              <input
                type="checkbox"
                id="tecnologia7"
                name="tech[]"
                value="Java"
              />
              <label for="tecnologia7"> Java</label>
              <input
                type="checkbox"
                id="tecnologia8"
                name="tech[]"
                value="React"
              />
              <label for="tecnologia8">React</label>
            </div>
          </div>
        </fieldset>

        <div class="campo">
          <br />
          <label for="experiencia"
            ><strong>Conte um pouco mais da sua experiência: </strong></label
          >
          <textarea
            rows="6"
            style="width: 350px"
            id="experiencia"
            name="experiencia"
          ></textarea>
        </div>
        <button class="botao" type="submit" name="submit" >Enviar</button>
      </form>
    </div>
  </body>
</html>

<?php 

include '../dbConnection.php';

if(isset($_POST['submit'])) { 
  $nome = $mysqli->real_escape_string($_POST['nome']);
  $sobrenome = $mysqli->real_escape_string($_POST["sobrenome"]);
  $email = $mysqli->real_escape_string($_POST['email']);
  $usuario = $mysqli->real_escape_string($_POST["usuario"]);
  $senha = $mysqli->real_escape_string($_POST["senha"]);
  $interesse = $mysqli->real_escape_string($_POST['interesse']);
  $senioridade = $mysqli->real_escape_string($_POST['senioridade']);
  $devweb = $mysqli->real_escape_string($_POST['devweb']);
  $tech = $mysqli->real_escape_string($_POST['tech']);
  $experiencia = $mysqli->real_escape_string($_POST['experiencia']);

  $sql = "INSERT INTO usuarios(nome, sobrenome, email, usuario, senha, interesse_ti, experience) VALUES('$nome', '$sobrenome', '$email', '$usuario', '$senha', '$interesse', '$experiencia')";

  $results = mysqli_query($mysqli, $sql);
  var_dump($results);

  if(!$results) {
    echo "Error while inserting in DataBase !!! 💀 💀 💀 . $mysqli->error";
    die("⛔ ⛔ ⛔ ");
  } else {
    echo("<script>alert('Usuário registrado com sucesso!!! 🚀') </script>");
    
  }
} else {
  echo "<script>alert('Verifique suas informações')</script>";
  echo "Verifique suas informações" . $mysqli->error;
  die("");
}
?>