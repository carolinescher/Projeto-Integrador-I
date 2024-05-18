<?php
require_once ("./utils/connection.php");

$email = 'novo.agente@example.com';
$password = sha1('senhaSegura123');
$nome_completo = 'Novo Agente';
$telefone = '11999999999';
$tipo_vaga = 'Junior';
$sobre_mim = 'Proativo e sempre buscando aprender mais.';
$formacao_academica = 'Graduação em Administração';
$caminho_foto = '/cv/img/homem.jpeg';

$query = "INSERT INTO agente (email, senha, nome_completo, telefone, tipo_vaga, sobre_mim, formacao_academica, caminho_foto) 
VALUES ('$email', '$password', '$nome_completo', '$telefone', '$tipo_vaga', '$sobre_mim', '$formacao_academica', '$caminho_foto')";

if (mysqli_query($connection, $query)) {
    echo "Usuário criado com sucesso!";
} else {
    echo "Erro ao criar usuário: " . mysqli_error($connection);
}
?>
