<?php
// conexão
include_once 'db_connect.php';

function clear($input){
  global $connect;
  // sql injection
  $var = mysqli_escape_string($connect, $input);
  // xss
  $var = htmlspecialchars($var);
  return $var;
}

if (isset($_POST['btn-atualizar'])):

    $sql = "SELECT imagem FROM noticias WHERE id = $_POST[id]";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
    $id = clear($_POST['id']); 
    $titulo = clear($_POST['titulo']);
    $descricao = clear($_POST['descricao']);
    $categoria = clear($_POST['categoria']);

    $sql = "UPDATE noticias SET titulo = '$titulo', descricao = '$descricao', categoria = '$categoria' WHERE id = '$id'";

    if(mysqli_query($connect, $sql)):
    header('Location: ../admin.index.php');
    else:
      echo 'erro ao cadastrar';
    endif;  
else:
    echo "Ops! erro ao ao atualizar noticia";    
endif;

if(isset($_POST['btn-atualizar-foto'])):
  $id = mysqli_escape_string($connect, $_POST['id']);
  $imagem = $_FILES['imagem']['name'];
  $extensao = strtolower(pathinfo($imagem, PATHINFO_EXTENSION));
  $novo_nome_imagem = md5(time()) . "." . $extensao;
  $diretorio = "uploads/";

  $sql = "UPDATE noticias SET imagem = '$novo_nome_imagem' WHERE id = '$id'";

  move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $novo_nome_imagem);

    if(mysqli_query($connect, $sql)):
    header('Location: ../index.php');
    else:
      echo 'erro ao cadastrar';
    endif;  

endif;