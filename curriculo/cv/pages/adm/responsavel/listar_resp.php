<?php
  require_once("../../utils/connection.php");

  session_start();
  $auth_user = $_SESSION["user_autenticated"];
  $user_id = $_SESSION["user_id"];

  //print_r($_SESSION);

  if(!$auth_user) {
    session_destroy();
    header("location: /curriculo/cv/index.php");
  }

  $query = "SELECT * FROM responsavel";
  $result = mysqli_query($connection, $query);

  if (isset($_FILES["curriculo"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["curriculo"]["name"]);
    if (move_uploaded_file($_FILES["curriculo"]["tmp_name"], $target_file)) {
        // Aqui você salvaria $target_file no banco de dados junto com os outros dados do agente
        $sql = "INSERT INTO responsavel (nome_completo, email, telefone, tipo_vaga, sobre_mim, formacao_academica,experiencia_proficional, caminho_foto, curriculo_path) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        // Prepare e execute a query aqui com $target_file como 'curriculo_path'
    } else {
        echo "Houve um erro ao carregar o arquivo.";
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
    <link rel="stylesheet" href="estilo/style_resp.css">
    <link rel="shortcut icon" href="../img/logo.png">
    <link rel="stylesheet" href="../../style_rodape.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


    <style>
       body{
        font-family: 'Roboto', Helvetica, sans-serif;
        }
        .table-bg th,
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


.button_crud {
    background-color: transparent; /* Cor de fundo dos botões para vermelho */
    color: black; /* Cor do texto dos botões para branco */
    border-radius: 10px; /* Bordas arredondadas */
    border: transparent; /* Remove as bordas */
    padding: 5px 10px; /* Ajuste o preenchimento conforme necessário */
    text-align: center; /* Alinha o texto no centro */
    cursor: pointer; /* Muda o cursor para indicar que é clicável */
    transition: background-color 0.3s; /* Suaviza a transição de cores */
}

.button_crud:hover {
    background-color:  #427ddbbe; /* Cor de fundo dos botões ao passar o mouse */
}


.button_crud_alterar:hover { /* Estilo para quando o mouse passa sobre o botão */
    background-color: transparent; /* Um tom de azul ainda mais escuro para o efeito hover */
    color: white;
}


.button_crud svg {
    width: 24px; /* Defina a largura do ícone conforme desejado */
    height: 24px; /* Defina a altura do ícone conforme desejado */
    fill: currentColor; /* Mantenha a cor do ícone igual à cor do texto */
}

.button_crud.delete {
    background-color: transparent;
    color: red; /* Cor do texto dos botões de deletar */
    border-radius: 10px;
    border: none;
    padding: 5px 10px;
    text-align: center;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s; /* Adicione transições para a cor de fundo e a cor do texto */
}

.button_crud.delete:hover {
    background-color: rgb(199, 98, 80); /* Cor de fundo ao passar o mouse */
    color: white; /* Cor do texto ao passar o mouse */
}
    </style>
</head>
<body>
     
<?php require_once "../../components/HomeHeader/navbar.php"; ?>
    
<div class="m-5">
    <table class="table text-white table-bg">
    <thead>
            <tr>
            <th>Nome Completo</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Tipo de Vaga Desejada</th>
                <th>Sobre Mim</th>
                <th>Formação Acadêmica</th>
                <th>Experiência Proficional</th>
                <th>Foto</th>
                <th>Currículo</th>
                
    </tr>
    </thead>
    <tbody>
    <?php
		 if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["nome_completo"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["telefone"] . "</td>";
                echo "<td>" . $row["tipo_vaga"] . "</td>";
                echo "<td>" . $row["sobre_mim"] . "</td>";
                echo "<td>" . $row["formacao_academica"] . "</td>";
                echo "<td>" . $row["experiencia_profissional"] . "</td>"; // Adicionando a coluna de experiência profissional
                echo "<td><img src='" . $row["caminho_foto"] . "' style='width:50px;height:50px;'></td>";
                echo "<td><a href='" . $row["curriculo_path"] . "' download='Curriculo_".$row["nome"].".pdf'>Baixar</a></td>";
                echo "</tr>";
            }
        } 
     ?>
     </tbody>
</table>
</div>
</div> <br><br><br><br><br>
    <script src="../../script.js" ></script>
    <script src="script.js"></script>

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
