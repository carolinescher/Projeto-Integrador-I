<?php
  require_once("../../utils/connection.php");

  session_start();
  $auth_user = $_SESSION["user_autenticated"];
  $user_id = $_SESSION["user_id"];

  //print_r($_SESSION);

  if($auth_user != 1) {
    session_destroy();
    header("location: /6bus/index.php");
  }
 
  if(array_key_exists("crud_action", $_SESSION) && $_SESSION["crud_action"] == True) {
    $_SESSION["crud_action"] = False;
    echo "
      <script>
        alert('".$_SESSION["modal_message"]."');
      </script>
    ";
  }

?>
  <?php

    $query = "SELECT * FROM agente WHERE id_agente = '$user_id'";
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      /*
      echo "Nome: " . $row["nome"];
      echo "<br>Email: " . $row["email"];
      echo "<br>CPF: " . $row["cpf"];
      echo "<br>Telefone: " . $row["telefone"];
    }   */ 
  }
  ?>



<?php require_once "../../components/HomeHeader/navbar.php"; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>6Bus</title>
  <link rel="stylesheet" href="estilo/style_agente.css"> 
  <link rel="stylesheet" href="../../style_nav.css"> 
  <link rel="stylesheet" href="estilo/style_rodape.css">
  <link rel="shortcut icon" href="img/logo.png">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <style>
  .material-symbols-outlined {
    font-size: 200px;
    font-variation-settings:
    'FILL' 0,
    'wght' 70,
    'GRAD' 0,
    'opsz' 24
  
  }
</style>
</head>
<div>
      <ul class="barra">
            <span>
              <?php echo "<li>Nome: " . $row["nome"];?> </li>
              <li><?php echo "<li>Email: " . $row["email"];?> </li>
              <li><?php echo "<li>Usuário: Responsável" ?> </li>
              <li><?php echo "<li>Telefone: " . $row["telefone"];?> </li>
            </span>
            <li> <button name="logout" onclick="confirmAction()"> Log off <span class="material-symbols-outlined">power_settings_new</span></button> 
            
          </li>
      </ul>
  </div>
<br>
  <h1>Cadastrar novos Usuários</h1>
  <br>
  <div class="carrosel">
  <div class="card">
  <div class="container">
  <a href="../aluno/cadastro_aluno.php"> <img width="200" height="200" src="https://img.icons8.com/3d-fluency/94/person-male--v1.png" alt="person-male--v1"/> </a>
    <p class="link"><a href="../responsavel/cadastro_resp.php">Cadastrar de Aluno</a></p>
  </div>
</div>

<div class="card">
  <div class="container">
  <a href="../agente/cadastro_agente.php"> <img width="200" height="200" src="https://img.icons8.com/3d-fluency/94/person-male--v1.png" alt="person-male--v1"/> </a>
    <p class="link"><a href="../agente/cadastro_agente.php">Administrador Geral</a></p>
  </div>
</div>

<div class="card">
  <div class="container">
  <a href="../monitor/cadastro_monitor.php"> <img width="200" height="200" src="https://img.icons8.com/3d-fluency/94/person-male--v1.png" alt="person-male--v1"/> </a>
    <p class="link"><a href="../monitor/cadastro_monitor.php">Cadastrar Monitor</a></p>
  </div>
</div>

<div class="card">
  <div class="container">
  <a href="../responsavel/cadastro_resp.php"> <img width="200" height="200" src="https://img.icons8.com/3d-fluency/94/person-male--v1.png" alt="person-male--v1"/> </a>
    <p class="link"><a href="../responsavel/cadastro_resp.php" >Cadastrar Responsável</a></p>
  </div>
</div>
<br><br>

<div class="card">
  <div class="container">
  <a href="../onibus/cadastro_onibus.php"> <img width="200" height="200" src="https://img.icons8.com/3d-fluency/94/person-male--v1.png" alt="person-male--v1"/> </a>
    <p class="link"><a href="../onibus/cadastro_onibus.php">Cadastrar Ônibus</a></p>
  </div>
</div>
</div>
<h1>Listar Usuários</h1>
<br><br>
<div class="carrosel">
<div class="card">
  <div class="container">
  <a href="../monitor/listar_monitores.php"> <img width="200" height="200" src="https://img.icons8.com/3d-fluency/94/person-male--v1.png" alt="person-male--v1"/> </a>
    <p class="link"><a href="../monitor/listar_monitores.php">Listar Monitor</a></p>
  </div>
</div>

<div class="card">
  <div class="container">
  <a href="../agente/listar_agente.php"> <img width="200" height="200" src="https://img.icons8.com/3d-fluency/94/person-male--v1.png" alt="person-male--v1"/> </a>
    <p class="link"><a href="../agente/listar_agente.php">Listar Admistrador Geral</a></p>
  </div>
</div>

<div class="card">
  <div class="container">
  <a href="../onibus/listar_onibus.php"> <img width="200" height="200" src="https://img.icons8.com/3d-fluency/94/person-male--v1.png" alt="person-male--v1"/> </a>
    <p class="link"><a href="../onibus/listar_onibus.php">Listar Ônibus</a></p>
  </div>
</div>
</div>


<br> <br> 
  

    <script src="../../script.js" ></script>
  <script src="script.js" ></script>
</body>
</html>