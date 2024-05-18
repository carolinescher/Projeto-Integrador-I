<?php require_once "./components/LoginHeader/navbar.php"; ?>

<?php require_once ("./utils/connection.php"); 

    if(isset($_POST["ok"])){

      $emailR = mysqli->escape_string($_POST['email']);

      if(!filter_var($emailR, FILTER_VALIDATE_EMAIL)){
          $erro[] = "Email inválido.";

      }

  
        $dado =$sql_query->fetch_assoc();
        $total = $sql_query->num_rows;

        $login_user = $_SESSION["user_profile"];
        if($login_user == "agente") {
            $query = "SELECT id_agente, senha FROM agente WHERE email = '$email' AND senha= '$password'";
        } else if($login_user == "monitor") {
            $query = "SELECT id_monitor, senha FROM monitor WHERE email = '$email' AND senha= '$password'";
        } else if($login_user == "responsavel") {
            $query = "SELECT id_responsavel, senha FROM responsavel WHERE email = '$email' AND senha= '$password'";
        } else if($login_user == "gerente") {
            $query = "SELECT id_gerente, senha FROM gerente_adm WHERE email = '$email' AND senha= '$password'";
        }
      
        if($total == 0)
        $erro = "O e-mail informado não existe no banco de dados";
     

      if(count($erro) == 0 && $total > 0){

        $newpassword = substr(sha1(time()), 0, 6);
        $nscriptografada = sha1(sha1($newpassword));
        $emailR = mysqli->escape_string($_POST['email']);

        if(mail($emailR, "Sua nova senha", "Está é a sua nova senha: ".$newpassword)){

        $query = "UPDATE usuario SET senha = '$nscriptografada' WHERE email = '$emailR'";
        $sql_query = mysqli->query($query) or die($mysqli->error);

      }

    }

}

    //echo substr(sha1(time()), 0, 6);


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
  <link rel="shortcut icon" href="img/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>
<body>
    <form action="" method="POST">
        <input placeholder="Digite o seu email:" name="email" type="text">
        <input name="ok" value="ok" type="submit">
    
    <?php if(count($erro) > 0)
          foreach($erro as $msg) {
              echo "<p>$msg</p>";
        }
        ?>
    </form>
<script src="script.js"></script>
<footer>
</footer>
</body>
</html>