<?php
session_start();

// Configurar usuário autenticado automaticamente
$_SESSION["user_autenticated"] = true;
$_SESSION["user_id"] = 1;  // ID do usuário padrão
$_SESSION["user_profile"] = "agente";  // Perfil do usuário padrão

// Redirecionar para a página inicial do perfil do usuário
header("location: pages/adm");
exit();
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>6Bus</title>
  <link rel="stylesheet" href="style_nav.css"> 
  <link rel="stylesheet" href="style_login.css">
  <link rel="stylesheet" href="style_rodape.css">
  <link rel="shortcut icon" href="img/logo.png">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:800&display=swap"/>

</head>
<body>

  <?php require_once "./components/LoginHeader/navbar.php"; ?>

  <div class="teste">
    <div class="semi-transparent-rectangle">
      <form action="" method="post">
      <h1 id="title_form">Login Usuário</h1>
      <br>
            <div class="input-container">
            <select name="login_user" id="select_user" required>
                <option value="" diseble> </option>
                <option value="agente"> Gerente Administrativo </option>
                <option value="monitor">Monitor</option>
                <option value="responsavel">Responsável</option>
                <option value="gerente"> Administrador Geral</option>
            </select>
            <label for="select_user"> Entrar como </label>
            </div>
              <?php
              /*
              <label for="">Cod. Escola:</label>
              <select name="" id="">
                  <option value="1">ETEC ITAQUAQUECETUBA</option>
                  <option value="2">ETEC APRÍGIO GONZAGA</option>
                  <option value="3">ETEC DA ZONA LESTE</option>
                  <option value="4">ETEC MARTIN LUTHER KING</option>
                  <option value="5">ETEC DAS ARTES</option>
              </select>
            */
              ?>
          
          <div class="input-container">
            <input 
                type="email" 
                name="email" 
                required/>
            <label for="email"> E-mail </label>
          </div>

          <div class="input-container">
            <input 
                id= "mostrar_senha password" 
                type="password" 
                name="password"  
                required/>
            <label for="password">Senha</label>
            <span class="material-symbols-outlined eye1">visibility</span>
          </div>
      <button class="button_submit">
      Entrar
  </form>
</div>
</div>
  
<?php
require_once ("./utils/connection.php");

$email = "";
$password = "";
$login_user = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = htmlspecialchars($_POST["email"]);
  $password = sha1($_POST["password"]);
  $login_user = htmlspecialchars($_POST["login_user"]);
  //echo 'Senha criptografada: ' . $password;

  if($login_user == "agente") {
      $query = "SELECT id_agente, senha FROM agente WHERE email = '$email' AND senha= '$password'";
  } else if($login_user == "monitor") {
      $query = "SELECT id_monitor, senha FROM monitor WHERE email = '$email' AND senha= '$password'";
  } else if($login_user == "responsavel") {
      $query = "SELECT id_responsavel, senha FROM responsavel WHERE email = '$email' AND senha= '$password'";
  } else if($login_user == "gerente") {
      $query = "SELECT id_gerente, senha FROM gerente_adm WHERE email = '$email' AND senha= '$password'";
  }

  //echo $query; exit;
  $result = mysqli_query($connection, $query);
  
  if(mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $column_id = "id_".$login_user;
   
      $_SESSION["user_autenticated"] = True;
      $_SESSION["user_id"] = $row[$column_id];

      if($login_user == "agente") {
        $_SESSION["user_profile"] = "agente";
        header("location: pages/agente/index.php");
      } else if($login_user == "monitor") {
        $_SESSION["user_profile"] = "monitor";
        header("location: pages/monitor/index.php");
      } else if($login_user == "responsavel") {
        $_SESSION["user_profile"] = "responsavel";
        header("location: pages/responsavel/index.php");
      } else if($login_user == "gerente") {
        $_SESSION["user_profile"] = "gerente";
        header("location: pages/adm/index.php");
      }

    } else {
      echo "<script>alert('Usuário ou senha inválidos - Senha inválida');</script>";            
    }

  } 

?>

<script src="script.js"></script>

<footer>
    <p> &copy; 2023 - Todos os direitos reservados </p>
    <p> Entre em contato pelo e-mail: contato@exemplo.com </p>
    <nav>
        <ul>
            <li><a class="rodape" href="#"> Termos de uso </a></li>
            <li><a class="rodape" href="#"> Política de privacidade </a></li>
            <li><a class="rodape" href="#"> Sobre nós </a></li>
        </ul>
    </nav>
</footer>
</body>
</html>