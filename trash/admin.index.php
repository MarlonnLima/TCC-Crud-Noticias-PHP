<?php
//sessão
session_start();
//verificar sessão
if (isset($_SESSION)):
    if ($_SESSION['admin'] == true):
//Conexão
include_once 'php_action/db_connect.php';

//Header
include_once 'includes/header.php';

//Banner
include_once 'includes/banner.php';
//timezone
date_default_timezone_set("America/Sao_Paulo");

?>
<a class = "botao-adicionar" href="adicionar.php">Adicionar Noticia</a>
<span class ="titulo">Noticias</span>
</div>
<div class="row row-cols-1 row-cols-md-3 mx-2">

<?php
//verificar se foi passado na url a pagina atual das noticias, senão é igual a primeira
$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
//selecionar todas as noticias do banco
$sql = "SELECT * FROM noticias";
$resultado = mysqli_query($connect, $sql);
//contar o total de noticias
$total_noticias = mysqli_num_rows($resultado);
//setar a cantidade de noticias por página
$quantidadeItensPorPagina = 6;
//calcular o número de páginas necessárias para apresentar
//as noticias
$num_pagina = ceil($total_noticias/$quantidadeItensPorPagina);
//Calcular o inicio da visualização
$inicio = ($quantidadeItensPorPagina*$pagina) -$quantidadeItensPorPagina;
//selecionar as noticias para serem apresentadas
$sql_noticias_paginadas = "SELECT * FROM noticias limit $inicio, $quantidadeItensPorPagina";
$resultado_noticias = mysqli_query($connect, $sql_noticias_paginadas);
$total_noticias = mysqli_num_rows($resultado_noticias);

if(mysqli_num_rows($resultado) > 0):
while($dados = mysqli_fetch_array($resultado_noticias)):
?>

  <div class="col">
    <div class="card my-2">
      <img src="php_action/uploads/<?php echo $dados['imagem'];?>" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?php echo $dados['titulo'];?></h5>
        <span class ="categoria-noticia"><?php echo $dados['categoria']; ?></span>
        <p class="card-text"><?php echo $dados['descricao']; ?></p>
        <hr>
        <div class ="botoes-noticia">
          <a href = "atualizar.php?id=<?php echo $dados['id'];?>"><i class="fa-solid fa-pencil"></i></a>
          <a href = "atualizarFoto.php?id=<?php echo $dados['id'];?>"><i class="fa-solid fa-camera-rotate"></i></a>
          <a href = "php_action/delete.php?id=<?php echo $dados['id'];?>"><i class="fa-solid fa-trash"></i></a>
        </div>
      </div>
    </div>
  </div>

<?php
endwhile;
else:
  echo "Ops! parece que ainda não tem nenhuma noticia cadastrada";
endif;
?>
<nav class = "mx-auto" aria-label="...">
  <ul class="pagination">
    <li class="page-item">
      <?php
      //pagina anterior
      if(isset($_GET['pagina'])){
        $paginalAtual = $_GET['pagina'];
      }else{
        $paginalAtual = 1;
      }
          if($paginalAtual >= 2){ ?>
          <a class="page-link" href="index.php?pagina=<?= $paginalAtual - 1?>" tabindex="-1">Anterior</a>
          <?php
        }
      ?>
    </li>
   
    <?php
    //Apresentar paginação
    for($i = 1; $i < $num_pagina; $i++){ ?>

    <li class="page-item"><a class="page-link" href="index.php?pagina=<?= $i ?>"><?php echo $i; ?></a></li>
        
    <?php }
    ?>

    <li class="page-item">
    <?php
        if($paginalAtual != $num_pagina - 1){ ?>
          <a class="page-link" href="index.php?pagina=<?= $paginalAtual + 1?>">Próximo</a>
          <?php
        }
      ?>
    </li>
  </ul>
</nav>
</div>

<?php
//footer
include_once 'includes/footer.php';
    else:
        header("Location: index.php");
    endif; // da session
endif; // do isset
?>


        