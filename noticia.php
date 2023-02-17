<?php
//sessão
session_start();
//conexão
require_once 'php_action/db_connect.php';
//header
require_once 'includes/header.php';
//GET PARAM
$noticia = $_GET['noticia'];
//SQL
$sql = "SELECT * FROM noticias WHERE id = $noticia";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);
?>
    <div class = "container text-center my-5">
        <img class = "w-50 news-img"src = "php_action/uploads/<?php echo $dados['imagem']; ?>">
        <h1 class ="text-danger mt-5"><?= $dados['titulo']?></h1>
        <span class ="text-secondary"><?= $dados['categoria']; ?></span>
        <!-- foi colocado uma div porque o que vem do banco já é uma tag p -->
        <div>
            <?= $dados['descricao']?>
        </div>
    </div>






<?php
require_once 'includes/footer.php';
?>