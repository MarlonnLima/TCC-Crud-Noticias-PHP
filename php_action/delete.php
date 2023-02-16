<?php
//conexão
require_once 'db_connect.php';
function clear($input){
    global $connect;
    // sql injection
    $var = mysqli_escape_string($connect, $input);
    // xss
    $var = htmlspecialchars($var);
    return $var;
}
// Pegar ID passado pela URL para deletar
$id = clear($_GET['id']);

$sql = "DELETE FROM noticias WHERE id = '$id'";

if(mysqli_query($connect, $sql)):
    header('Location: ../index.php');
else:
    echo "erro ao deletar";
endif;

