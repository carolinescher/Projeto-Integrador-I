<?php
  require_once("../../utils/connection.php");

  session_start();
  $auth_user = $_SESSION["user_autenticated"];
  $user_id = $_SESSION["user_id"];

  //print_r($_SESSION);

  if(!$auth_user) {
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

    $query = "SELECT * FROM responsavel WHERE id_responsavel = '$user_id'";
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
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>6Bus</title>
    <link rel="stylesheet" href="../../style_nav.css">
    <link rel="stylesheet" href="estilo/style_responsavel.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="shortcut icon" href="../img/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

<style>
  body{
  font-family: Arial, sans-serif;
  background-color: #00ADEF;
  margin: 0;
  overflow-x: hidden;
  list-style: none;
}
.barra {
  list-style-type: none;
  margin: 0;
  padding: 10px 10px 10px 10px;
  background-color: #0b8cbe;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.barra span {
  gap: 20px;
  display: flex;
}

.barra button {
  display: flex;
  padding: 6px 12px;
  border: none;
  border-radius: 8px;
  background-color: #FFC800;
}

.barra button span {
  margin-left: 6px;
}
h2 {
  font-size: 35px;
  font-family: 'Montserrat', sans-serif; /* Aplica a fonte Montserrat Extra-Bold */
  font-weight: 800; /* Define o peso da fonte como Extra-Bold */
  text-shadow: 2px 2px rgba(0, 0, 0, 0.13);
  color: white;
  margin: 10px;
  position: relative;
  left: 30px;
}
th {
  margin-top: 50px;

  width: 450px;
  padding: 25px 50px 50px 30px;
  color: #FFFFFF;
  border-radius: 15px;
  margin-bottom: 50px;
  margin: 10px;
}
        .table-bg td {
            background-color: transparent;
            text-align: center; /* Centraliza o conteúdo horizontalmente */
            vertical-align: middle; /* Centraliza o conteúdo verticalmente */
            padding: 10px;
            text-align: left;
        }

        .table-bg {
            background-color: rgba(255, 255, 255, 0.5);
        border-collapse: separate;
        border-spacing: 0;
        border-radius: 10px; /* Bordas arredondadas */
        overflow: hidden; /* Garante que o conteúdo também respeite as bordas arredondadas */
        width: 100%; /* Ajuste a largura conforme necessário */
        padding: 10px;
        }
        body{
        font-family: 'Montserrat', sans-serif;
        background-color: #00ADEF;
        margin: 0;
        overflow-x: hidden;
        }
        .button_crud{
          border-radius: 5px;
          border: none;
          padding: 3px;
          background-color:  rgba(235, 182, 8, 0.808);
        }
  </style>
</head>
<body>
<div>
      <ul class="barra">
            <span>
              <?php echo "<li>Nome: " . $row["nome"];?> </li>
              <li><?php echo "<li>Email: " . $row["email"];?> </li>
              <li><?php echo "<li>Usuário: Responsável" ?> </li>
              <li><?php echo "<li>Telefone: " . $row["telefone"];?> </li>
            </span>
      
            
          </li>
      </ul>
  </div>

  <br><br>
  <h2>Filho(s) Cadastrados</h2>
  <div class="m-5">
    <table class="table text-white table-bg">
        
  <table class="table text-white table-bg">
    <tr>
      <th scope="col">Matrícula</th>
      <th scope="col">Nome</th>
      <th scope="col">CPF</th>
      <th scope="col">Endereco</th>
      <th scope="col">Ponto Embarque</th>
      <th scope="col">Cor do Ônibus</th>
      <th scope="col">Data Nascimento</th>
      <th scope="col">Nome do Monitor</th>
      <th scope="col">Ver Mais</th>
    </tr>

  <?php

  $queryDataFilhos = "SELECT
    a.matricula AS matricula,
    a.nome AS nome,
    a.endereco AS endereco,
    a.data_nascimento AS data_nascimento,
    a.id_aluno AS id_aluno,
    a.fk_onibus AS fk_onibus,
    a.fk_responsavel AS fk_responsavel,
    a.ponto_embarque AS ponto_embarque,
    a.cpf AS cpf,
    c.cor_onibus AS cor_onibus,
    c.id_onibus AS id_onibus,
    d.nome AS nome_monitor
  FROM aluno AS a
  INNER JOIN responsavel AS b ON id_responsavel = fk_responsavel
  INNER JOIN onibus AS c ON id_onibus = fk_onibus
  INNER JOIN monitor AS d ON fk_onibus2 = fk_onibus
  WHERE id_responsavel = '$user_id'";
  // INNER JOIN monitor AS d ON fk_onibus = id_onibus";
  $resultDataFilhos = mysqli_query($connection, $queryDataFilhos);
  
  if(mysqli_num_rows($resultDataFilhos) > 0) {
    while($rowDataFilhos = mysqli_fetch_assoc($resultDataFilhos)) {               
      echo "<tr>";
      echo "<td>".$rowDataFilhos["id_aluno"]."</td>";
      echo "<td>".$rowDataFilhos["nome"]."</td>";
      echo "<td>".$rowDataFilhos["cpf"]."</td>";
      echo "<td>".$rowDataFilhos["endereco"]."</td>";
      echo "<td>".$rowDataFilhos["ponto_embarque"]."</td>";
      echo "<td>".$rowDataFilhos["cor_onibus"]."</td>";
      echo "<td>".date('d/m/Y', strtotime($rowDataFilhos["data_nascimento"]))."</td>";
      echo "<td>".$rowDataFilhos["nome_monitor"]."</td>";
      echo '<td>
            <button onclick="" class="button_crud plus">
              <a href="/6bus/pages/aluno/ver_detalhes.php?paramId='.$rowDataFilhos["id_aluno"].'">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFFFFF" viewBox="0 0 256 256">
                  <path d="M224,128a8,8,0,0,1-8,8H136v80a8,8,0,0,1-16,0V136H40a8,8,0,0,1,0-16h80V40a8,8,0,0,1,16,0v80h80A8,8,0,0,1,224,128Z"></path>
                </svg>
              </a>
            </button>';
      echo "</td>";
      echo "</tr>";
    }
  }
 ?>
  <script src="script.js"></script>
  <script src="../../script.js"></script>
</body>
</html>