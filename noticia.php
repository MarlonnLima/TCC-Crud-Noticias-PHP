<?php
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
        <img class = "w-50"src = "php_action/uploads/<?php echo $dados['imagem']; ?>">
        <h2 class ="text-danger mt-2"><?= $dados['titulo']?></h2>
        <span class ="text-secondary"><?= $dados['categoria']; ?></span>
        <p><?= $dados['descricao']?></p>
    </div>






<?php
require_once 'includes/footer.php';
?>