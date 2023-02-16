<?php
//conexão
require_once 'db_connect.php';

if (isset($_POST['btn-logar'])):
    $usuario = $_POST['usuario'];
    $senha = md5($_POST['senha']);
    $sql = "SELECT * FROM usuarios WHERE email = '$usuario' AND senha = '$senha'";
    $resultado = mysqli_query($connect, $sql);
    if(mysqli_num_rows($resultado) > 0 ):
    $dados = mysqli_fetch_array($resultado);
        if ($dados['isAdmin'] == '1'):
        session_start();
        $_SESSION['admin'] = true;
        $_SESSION['nome_user'] = $dados['nome'];
        else:
        session_start();
        $_SESSION['admin'] = false;
        $_SESSION['nome_user'] = $dados['nome'];
    endif;
    header("Location: ../index.php");
else:
    header('Location: ../login.php');
endif;
endif;