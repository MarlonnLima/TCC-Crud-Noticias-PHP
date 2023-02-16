<?php
//conexão
$servername = "localhost";
$username = "root";
$password = "44565";
$db_name = "crud-noticias";

$connect = mysqli_connect($servername, $username, $password, $db_name);

if (mysqli_connect_error()):
    echo "erro ao conectar com o banco de dados" . mysqli_connect_error();
endif;