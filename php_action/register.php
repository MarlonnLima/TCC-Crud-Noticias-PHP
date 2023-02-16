<?php
//conexão
include_once './db_connect.php';
if (isset($_POST['btn-cadastrar'])):
    $nome = $_POST['nome'];
    $usuario = $_POST['usuario'];
    $senha = md5($_POST['senha']);

    $sql = "INSERT INTO usuarios (nome, email, senha, isAdmin) VALUES ('$nome', '$usuario', '$senha', '0')";

    mysqli_query($connect, $sql);

    header("Location: ../login.php");
else:
    echo "Ops! erro ao cadastrar usuario.";
endif;
