
<?php
include 'connection.php';

$nomeCompleto = $email = $telefone = $tipoVaga = $sobreMim = $formacaoAcademica = "";
$erroNome = $erroEmail = $erroTelefone = $erroFoto = "";

$regexEmail = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
$regexTelefone = '/^\d{11}$/';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pegue os dados do formulário
    $nomeCompleto = htmlspecialchars($_POST["nome_completo"]);
    $email = htmlspecialchars($_POST["email"]);
    $telefone = htmlspecialchars($_POST["telefone"]);
    $tipoVaga = htmlspecialchars($_POST["tipo_vaga"]);
    $sobreMim = htmlspecialchars($_POST["sobre_mim"]);
    $formacaoAcademica = htmlspecialchars($_POST["formacao_academica"]);
    $experienciaProfissional = htmlspecialchars($_POST["experiencia"]);
   

    // Prepare a SQL para inserção
    $sql = "INSERT INTO tabela_responsaveis (nome, email) VALUES ('$nomeCompleto', '$email','$telefone','$tipoVaga','$sobreMim','$formacaoAcademica')";

    if ($conn->query($sql) === TRUE) {
        echo "Novo registro criado com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
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
    <link rel="stylesheet" href="estilo/style_agente.css">
    <link rel="shortcut icon" href="../img/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:800&display=swap">

    <style>
        body{
        font-family: Arial, Helvetica, sans-serif;
        }
        .input_field {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

textarea.input_field {
    height: auto;  <!-- Permite que a área de texto se ajuste conforme definido pelo atributo rows -->
}

.input_wrap {
    position: relative;
    margin-bottom: 20px;
}
.input_wrap {
    position: relative;
    margin-bottom: 20px;
}

.input_field {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: white; /* Fundo branco */
}

.input_field:focus + label,
.input_field:valid + label {
    top: -20px;
    font-size: 12px;
    color: #5fa8d3;
    border-color: white;
}

label {
    position: absolute;
    left: 10px;
    top: 10px;
    color: #999;
    transition: all 0.3s;
    pointer-events: none;
}


    </style>
</head>
<body>
<?php require_once "../../components/HomeHeader/navbar.php"; ?>
<div class="container">
    <div class="center">
        <div class="semi-transparent-rectangle">
            <form action="" method="post" enctype="multipart/form-data">
                <h1 id="title_form">Baixa Escolaridade</h1> <br>

                <div class="input_wrap">
                    <input class="input_field" type="text" name="nome_completo" maxlength="30" value="<?php echo htmlspecialchars($_POST['nome_completo'] ?? ''); ?>" required />
                    <label for="nome_completo">Nome completo</label>
                    <?php echo $erroNome ? "<div class='container_erro'><span class='material-symbols-outlined'>warning</span><p class='erro_mensagem'>$erroNome</p></div>" : ''; ?>
                </div>

                <div class="input_wrap">
                    <input class="input_field" type="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required />
                    <label for="email">E-mail</label>
                    <?php echo $erroEmail ? "<div class='container_erro'><span class='material-symbols-outlined'>warning</span><p class='erro_mensagem'>$erroEmail</p></div>" : ''; ?>
                </div>

                <div class="input_wrap">
                    <input class="input_field" type="text" name="telefone" value="<?php echo htmlspecialchars($_POST['telefone'] ?? ''); ?>" required />
                    <label for="telefone">Telefone para contato</label>
                    <?php echo $erroTelefone ? "<div class='container_erro'><span class='material-symbols-outlined'>warning</span><p class='erro_mensagem'>$erroTelefone</p></div>" : ''; ?>
                </div>

                <div class="input_wrap">
                    <input class="input_field" type="text" name="tipo_vaga" maxlength="30" value="<?php echo htmlspecialchars($_POST['tipo_vaga'] ?? ''); ?>" required />
                    <label for="tipo_vaga">Tipo de vaga desejada</label>
                    <?php echo $errotipoVaga ? "<div class='container_erro'><span class='material-symbols-outlined'>warning</span><p class='erro_mensagem'>$errotipoVaga</p></div>" : ''; ?>
                </div>


                <div class="input_wrap">
                    <textarea class="input_field" name="sobre_mim" required rows="5"><?php echo htmlspecialchars($_POST['sobre_mim'] ?? ''); ?></textarea>
                    <label for="sobre_mim">Sobre Mim</label>
                </div>
                <div class="input_wrap">
                    <textarea class="input_field" name="sobre_mim" required rows="5"><?php echo htmlspecialchars($_POST['sobre_mim'] ?? ''); ?></textarea>
                    <label for="sobre_mim">Experiência Profissional</label>
                </div>
                <div class="input_wrap">
                    <textarea class="input_field" name="formacao_academica" required rows="5"><?php echo htmlspecialchars($_POST['formacao_academica'] ?? ''); ?></textarea>
                    <label for="formacao_academica">Formação Acadêmica</label>
                </div>

                

                <button class="button_submit" type="submit">
                    Enviar Currículo
                    <span class="material-symbols-outlined">chevron_right</span>
                </button>
            </form>
        </div>
    </div>

    <script src="../../inputMask.js"></script>
    <script src="../../script.js"></script>

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
</body>
</html>
