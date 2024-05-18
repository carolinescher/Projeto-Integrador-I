<?php 
    require_once("../../utils/connection.php");

    $senha = $confirmarSenha = "";
	$errorFieldName = $errorFieldEmail = $errorFieldTelefone = $errorFieldCpf = $errorFieldSenha = $errorConfirmarSenha = "";

    $regexEmail = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    $regexPassword = '/^(?=.*[!@#$%^&*()\-_=+{};:,<.>]).{6,}$/';
    $regexTelefone = '/^\d{11}$/';
    $regexCPF = '/^\d{11}$/';

    $getParamId = $_GET["paramId"];

    $queryGetDataUser = "SELECT * FROM agente WHERE id_agente = '$getParamId'";
    $result = mysqli_query($connection, $queryGetDataUser);
    // $nomeAgente = $_SESSION["nome_agente"];
    
    if(mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $nomeAgente = $row['nome'];
      $emailAgente = $row['email'];
      $telefoneAgente = $row['telefone'];
      $cpfAgente = $row['cpf'];
      //echo $row['nome'].' '.$row['email'];
    } else {
      header("location: /curriculo/cv/pages/agente/alterar_agente.php");
    }

    if($_SERVER["REQUEST_METHOD"] == "POST") {
          $nomeAgente = htmlspecialchars($_POST["name"]);
          $emailAgente = htmlspecialchars($_POST["email"]);
          $telefoneAgente = htmlspecialchars($_POST["telefone"]);
          $cpfAgente = htmlspecialchars($_POST["cpf"]);
          $senha = htmlspecialchars($_POST["password"]);
          $confirmarSenha = htmlspecialchars($_POST["confirm_password"]);

          if(empty($nomeAgente) || trim($nomeAgente) == '') {
              $errorFieldName = 1;
          } else if(strlen($nomeAgente) < 3) {
              $errorFieldName = 2;
          } else {
              $errorFieldName = 0;
          }

          if(!preg_match($regexEmail, $emailAgente)) {
              $errorFieldEmail = 1;
          } else if(empty($emailAgente)) {
              $errorFieldEmail = 2;
          } else {
              $errorFieldEmail = 0;
          }

          if(!preg_match($regexTelefone, $telefoneAgente)) {
              $errorFieldTelefone = 1;
          } else if(empty($telefoneAgente)) {
              $errorFieldTelefone = 2;
          } else {
              $errorFieldTelefone = 0;
          }

          if(!preg_match($regexCPF, $cpfAgente)) {
              $errorFieldCpf = 1;
          } else if(empty($cpfAgente)) {
              $errorFieldCpf = 2;
          } else {
              $errorFieldCpf = 0;
          }

          if(!preg_match($regexPassword, $senha)) {
              $errorFieldSenha = 1;
          } else {
              $errorFieldSenha = 0;
          }

          if($confirmarSenha != $senha) { 
              $errorConfirmarSenha = 1;
          } else if(empty($confirmarSenha)) {
              $errorConfirmarSenha = 2;
          }else {
              $errorConfirmarSenha = 0;
          }

          if(!$errorFieldName && !$errorFieldEmail && !$errorFieldCpf && !$errorFieldTelefone && !$errorFieldSenha && !$errorConfirmarSenha){

              $senha_cripto = sha1($senha);

              $sql = "UPDATE agente SET nome = '$nomeAgente', email = '$emailAgente', senha = '$senha_cripto', cpf = '$cpfAgente', telefone = '$telefoneAgente' WHERE id_agente = '$getParamId'";
      
              if (mysqli_query($connection, $sql)){
                  session_start();
                  print_r($_SESSION);
              
                  $_SESSION["crud_action"] = True;
                  $_SESSION["user_name"] = $nomeAgente;
                  $_SESSION["modal_message"] = "Administrador alterado com sucesso";

                  //Array ( [crud_action] => 1 [user_name] => thiago )
                  if($_SESSION["user_profile"] == "gerente") {
                      header("location: /6bus/pages/adm/index.php");
                  }
              }else{
                  echo "
                      <script>
                      alert('Usuário não alterado');
                      </script>
                      ";
                      
                  echo "Error: " . $sql . "<br>" . $connection->error;
              }
          }

    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>6Bus</title>
    <link rel="stylesheet" href="../../style_nav.css">
    <link rel="stylesheet" href="../../style_rodape.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:800&display=swap">
    <link rel="stylesheet" href="estilo/style_agente.css">
    <link rel="shortcut icon" href="../img/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <style>
        body{
        font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>
<body>
<?php require_once "../../components/HomeHeader/navbar.php"; ?>
<div class="container">
    <div class="center">
    <div class="semi-transparent-rectangle">
        <form action="" method="post">
            <h1 id="title_form">Editar informações</h1> <br>

            <div class="input_wrap">

                <input
                    class="input_field"
                    type="text"
                    name="name"

                    maxlength="30"
                    value="<?php echo $nomeAgente?>"
                    required

                />
                <label for="nome">Nome</label>
                <?php
                    if($errorFieldName == 1) {
                        echo "
                        <span class='container_erro'>
                            <span class='material-symbols-outlined'>warning</span>
                            <p class='erro_mensagem'>O campo não pode estar vazio!</p>
                        </span>";
                    } else if($errorFieldName == 2) {
                        echo "
                        <span class='container_erro'>
                            <span class='material-symbols-outlined'>warning</span>
                            <p class='erro_mensagem'>O nome inserido é muito curto!</p>
                        </span>
                        ";
                    }
                ?>
            </div>
            <div class="input_wrap">

                <input
                    class="input_field"
                    type="email"
                    name="email"

                    value="<?php echo $emailAgente?>"
                    required
                />
                <label for="email">E-mail</label>
                <?php
                    if($errorFieldEmail == 1) {
                        echo "
                        <span class='container_erro'>
                            <span class='material-symbols-outlined'>warning</span>
                            <p class='erro_mensagem'>Insira um email válido!</p>
                        </span>
                        ";
                    } else if($errorFieldEmail == 2) {
                        echo "
                        <span class='container_erro'>
                            <span class='material-symbols-outlined'>warning</span>
                            <p class='erro_mensagem'>O campo não pode estar vazio!</p>
                        </span>";
                    }
                ?>
            </div>
            <div class="input_wrap">

                <input
                    class="input_field"
                    type="text"
                    name="telefone"

                    value="<?php echo $telefoneAgente?>"
                    required
                    maxlength="11"
                >
                <label for="telefone">Telefone</label>
                <?php
                    if($errorFieldTelefone == 1) {
                        echo "
                        <span class='container_erro'>
                            <span class='material-symbols-outlined'>warning</span>
                            <p class='erro_mensagem'>Telefone inválido</p>
                        </span>
                        ";
                    } else if($errorFieldTelefone == 2) {
                        echo "
                        <span class='container_erro'>
                            <span class='material-symbols-outlined'>warning</span>
                            <p class='erro_mensagem'>O campo não pode estar vazio!</p>
                        </span>";
                    }
                ?>
            </div>
            <div class="input_wrap">

                <input
                    class="input_field"
                    type="text"
                    name="cpf"

                    value="<?php echo $cpfAgente?>"
                    required
                    maxlength="11"
                >
                <label for="cpf">CPF</label>
                <?php
                    if($errorFieldCpf == 1) {
                        echo "
                        <span class='container_erro'>
                            <span class='material-symbols-outlined'>warning</span>
                            <p class='erro_mensagem'>CPF inválido</p>
                        </span>
                        ";
                    } else if($errorFieldCpf == 2) {
                        echo "
                        <span class='container_erro'>
                            <span class='material-symbols-outlined'>warning</span>
                            <p class='erro_mensagem'>O campo não pode estar vazio!</p>
                        </span>";
                    }
                ?>
            </div>
            <div class="input_wrap">
                <input id="mostrar_senha" class="input_field password" type="password" name="password" required />
                <label for="password">Senha</label>
                <span class="eye-button">
                    <span class="material-symbols-outlined eye1">visibility</span>
                </span>
                <?php
                    if($errorFieldSenha == 1) {
                        echo "
                        <span class='container_erro'>
                            <span class='material-symbols-outlined'>warning</span>
                            <p class='erro_mensagem'>A senha deve conter pelo menos 6 caracteres <br>e possuir um caracter especial!</p>
                        </span>
                        ";
                    }
                ?>
            </div>
            <div class="input_wrap">

                <input class="input_field confirm_password" type="password" name="confirm_password" required/>
                <label for="confirm_password">Confirme sua senha</label>
                <span class="eye-button">
                    <span class="material-symbols-outlined eye2">visibility</span>
                </span>
                <?php
                    if($errorConfirmarSenha == 1) {
                        echo "
                        <span class='container_erro'>
                            <span class='material-symbols-outlined'>warning</span>
                            <p class='erro_mensagem'>A senha não confere com a anterior!</p>
                        </span>
                        ";
                    } else if($errorConfirmarSenha == 2) {
                        echo "
                        <span class='container_erro'>
                            <span class='material-symbols-outlined'>warning</span>
                            <p class='erro_mensagem'>O campo não pode estar vazio!</p>
                        </span>";
                    }
                ?>
            </div>
            <button class="button_submit" type="submit">
                Alterar
                <span class="material-symbols-outlined">chevron_right</span>
            </button>
        </form>
    </div>
    </div>

<?php

?>



<script src="../../script.js"></script>


<footer>
        <p>&copy; 2023 - Todos os direitos reservados</p>
        <p>Entre em contato pelo e-mail: contato@exemplo.com</p>
        <nav>
            <ul>
                <li><a class="rodape" href="#">Termos de uso</a></li>
                <li><a class="rodape" href="#">Política de privacidade</a></li>
                <li><a class="rodape" href="#">Sobre nós</a></li>
            </ul>
        </nav>
    </footer>
</body>
</html>