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
    header('Location: ' . $_SERVER["HTTP_REFERER"] );
exit; // É sempre uma boa ideia seguir uma header()instrução com um exitou a execução do código continuará pelo restante do script normalmente.
else:
    echo "erro ao deletar";
endif;

