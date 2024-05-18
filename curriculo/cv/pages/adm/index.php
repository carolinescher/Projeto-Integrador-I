<?php
  require_once("../../utils/connection.php");

  session_start();
  $auth_user = $_SESSION["user_autenticated"];
  $user_id = $_SESSION["user_id"];

  //print_r($_SESSION);

  if($auth_user != 1) {
    session_destroy();
    header("location: /cv/index.php");
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

    $query = "SELECT * FROM gerente_adm WHERE id_gerente = '$user_id'";
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
  <link rel="stylesheet" href="estilo/style_adm.css"> 
  <link rel="stylesheet" href="../../style_nav.css"> 
  <link rel="stylesheet" href="../../style_rodape.css"> 
  <link rel="shortcut icon" href="img/logo.png">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>
<body>
      

<br>
<h1>Cadastrar novo currículo</h1>
  <br>
  <div class="carrosel">
  <div class="card">
  <div class="container">
      
  </div>
</div>

<div class="card">
  <div class="container">
  <a href="../agente/cadastro_agente.php"> <img width="200" height="200" src="../../img/c_gerente.png" /> </a>
    <p class="link"><a href="../agente/cadastro_agente.php">Primeiro emprego</a></p>
  </div>
</div>

<div class="card">
  <div class="container">
  <a href="../responsavel/cadastro_resp.php"> <img width="200" height="200" src="../../img/c_responsavel.png"/> </a>
    <p class="link"><a href="../responsavel/cadastro_resp.php" >Baixa escolaridade</a></p>
  </div>
</div>




</div>
<h1>Meus Curriculos</h1>
<br><br>
<div class="carrosel">

<div class="card">
  <div class="container">
  <a href="../agente/listar_agente.php"> <img width="200" height="200" src="../../img/gerente.png"/> </a>
    <p class="link"><a href="../agente/listar_agente.php"> Primeiro emprego</a></p>
  </div>
</div>

<div class="card">
  <div class="container">
  <a href="../responsavel/listar_resp.php"> <img width="200" height="200" src="../../img/responsavel.png"/> </a>
    <p class="link"><a href="../responsavel/listar_resp.php"> Baixa escolaridade </a></p>
  </div>
</div>



</div>


<br> <br> 
  
<br> <br> 


 
<footer>
        <p>&copy; 2024 - Todos os direitos reservados</p>
        <p>Entre em contato pelo e-mail: contato@exemplo.com</p>
        <nav>
            <ul>
                <li><a class="rodape" href="#">Termos de uso</a></li>
                <li><a class="rodape" href="#">Política de privacidade</a></li>
                <li><a class="rodape" href="#">Sobre nós</a></li>
            </ul>
        </nav>
    </footer>


  <script src="script.js" ></script>
  <script src="../../script.js" ></script>
  
</body>
</html>