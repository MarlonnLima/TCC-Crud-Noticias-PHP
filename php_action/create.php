<?php
// conexão
include_once 'db_connect.php';

//função de limpeza para impedir mysql injection e xss
function clear($input){
    global $connect;
    // sql injection
    $var = mysqli_escape_string($connect, $input);
    // xss
    $var = htmlspecialchars($var);
    return $var;
}

if (isset($_POST['btn-cadastrar'])):
    $titulo = clear($_POST['titulo']);
    $descricao = clear($_POST['descricao']);
    $categoria = clear($_POST['categoria']);
    $imagem = $_FILES['imagem']['name'];
    $extensao = strtolower(pathinfo($imagem, PATHINFO_EXTENSION));
    $novo_nome_imagem = md5(time()) . "." . $extensao;
    $diretorio = "uploads/";

    move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $novo_nome_imagem);

    $sql = "INSERT INTO noticias (titulo, descricao, categoria, imagem) VALUES ('$titulo', '$descricao', '$categoria','$novo_nome_imagem')";

    mysqli_query($connect, $sql);
    header('Location: ../index.php');
else:
    echo "Ops! erro ao cadastrar noticia";    
endif;