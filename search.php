<?php
//session
session_start();
//conexão
require_once 'php_action/db_connect.php';

//Header
require_once 'includes/header.php';

//Banner
include_once 'includes/banner.php';
?>

<h1 class ="titulo">Noticias</h1>
<div class="row row-cols-1 row-cols-md-3 mx-2">


<?php

if (isset($_GET['buscar-no-banco'])):
  //verificar se foi passado na url a pagina atual das noticias, senão é igual a primeira
$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
  //verificar busca no banco
$digitadoNaBusca = $_GET['busca'];
$pesquisa = "%" . $digitadoNaBusca . "%";

$sql = "SELECT * FROM noticias WHERE titulo LIKE '$pesquisa' OR categoria LIKE '$pesquisa'";
$resultado = mysqli_query($connect, $sql);
//contar o total de noticias
$total_noticias = mysqli_num_rows($resultado);
//setar a quantidade de noticias por página
$quantidadeItensPorPagina = 6;
//calcular o número de páginas necessárias para apresentar as noticias
$num_pagina = ceil($total_noticias/$quantidadeItensPorPagina);
//Calcular o inicio da visualização
$inicio = ($quantidadeItensPorPagina*$pagina) -$quantidadeItensPorPagina;
//selecionar as noticias para serem apresentadas
$sql_noticias_paginadas = "SELECT * FROM noticias WHERE titulo LIKE '$pesquisa' OR categoria LIKE '$pesquisa' limit $inicio, $quantidadeItensPorPagina";
$resultado_noticias = mysqli_query($connect, $sql_noticias_paginadas);
$total_noticias = mysqli_num_rows($resultado_noticias);

if(mysqli_num_rows($resultado_noticias) > 0):
while($dados = mysqli_fetch_array($resultado_noticias)):
  
?>

<div class="col">
    <div class="card my-2">
      <img src="php_action/uploads/<?php echo $dados['imagem'];?>" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?php echo $dados['titulo'];?></h5>
        <span class ="categoria-noticia"><?php echo $dados['categoria']; ?></span>
        <!-- Aqui estou usando uma span para conter o texto se não as tags vazam e sobrepoem as outras -->
        <div class="card-text">
          <div>
            <?php echo substr(strip_tags($dados['descricao']), 0, 100) . '...'; ?>

            <a class ="d-block w-100 botao fundo-roxo texto-branco text-center" href ="noticia.php?noticia=<?= $dados['id']?>">Veja mais!</a>
            <?php
            if (isset($_SESSION['admin'])):
            if($_SESSION['admin'] == true): ?>

            <hr>

            <div class ="botoes-noticia">
              <a class = "texto-roxo" href = "atualizar.php?id=<?php echo $dados['id'];?>"><i class="fa-solid fa-pencil texto-roxo"></i></a>
              <a class = "texto-roxo" href = "atualizarFoto.php?id=<?php echo $dados['id'];?>"><i class="fa-solid fa-camera-rotate texto-roxo"></i></a>
              <a class = "texto-roxo" href = "php_action/delete.php?id=<?php echo $dados['id'];?>"><i class="fa-solid fa-trash texto-roxo"></i></a>
            </div>

            <?php  
            else:

            endif;
          endif;
            ?>
         </div>
        </div>
      </div>
    </div>
  </div>

<?php
endwhile;
else:
  echo "Ops! parece não há nenhuma noticia com esse titulo";
endif;
?>

</div>
</div>
<nav class = "container" aria-label="...">
  <ul class="pagination d-flex justify-content-center">
    <li class="page-item">
      <?php
      //pagina anterior
      if(isset($_GET['pagina'])){
        $paginalAtual = $_GET['pagina'];
      }else{
        $paginalAtual = 1;
      }
          if($paginalAtual >= 2){ ?>
          <a class="page-link" href="search.php?pagina=<?= $paginalAtual - 1?>" tabindex="-1">Anterior</a>
          <?php
        }
      ?>
    </li>
   
    <?php
    //Apresentar paginação
    for($i = 1; $i <= $num_pagina; $i++){ ?>

    <li class="page-item"><a class="page-link" href="search.php?pagina=<?= $i ?>"><?php echo $i; ?></a></li>
        
    <?php }
    ?>

    <li class="page-item">
    <?php
        if($paginalAtual != $num_pagina){ ?>
          <a class="page-link" href="search.php?pagina=<?= $paginalAtual + 1?>">Próximo</a>
          <?php
        }
      ?>
    </li>
  </ul>
</nav>
<?php
endif;
?>



<?php
//Footer
require_once 'includes/footer.php';
?>