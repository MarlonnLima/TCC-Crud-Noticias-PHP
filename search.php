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
if (isset($_POST['buscar-no-banco'])):
$digitadoNaBusca = $_POST['busca'];
$pesquisa = "%" . $digitadoNaBusca . "%";

$sql = "SELECT * FROM noticias WHERE titulo LIKE '$pesquisa' OR categoria LIKE '$pesquisa'";
$resultado = mysqli_query($connect, $sql);

if(mysqli_num_rows($resultado) > 0):
while($dados = mysqli_fetch_array($resultado)):
?>

<div class="col">
    <div class="card my-2">
      <img src="php_action/uploads/<?php echo $dados['imagem'];?>" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?php echo $dados['titulo'];?></h5>
        <span class ="categoria-noticia"><?php echo $dados['categoria']; ?></span>
        <p class="card-text"><?php echo $dados['descricao']; ?></p>
        <!-- <hr>
        <div class ="botoes-noticia">
          <a href = "atualizar.php?id=<?php echo $dados['id'];?>"><img class = "edit-button" src="https://cdn-icons-png.flaticon.com/512/4248/4248514.png" alt=""></a>
          <a href = "atualizarFoto.php?id=<?php echo $dados['id'];?>"><img class = "switch-photo-button" src = "https://img.icons8.com/external-flat-icons-inmotus-design/256/external-Camera-files-documents-operations-flat-icons-inmotus-design.png"></a>
          <a href = "php_action/delete.php?id=<?php echo $dados['id'];?>"><img class = "remove-button" src="https://cdn-icons-png.flaticon.com/512/1828/1828851.png" alt=""></a>
        </div> -->
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
<?php
endif;
?>

<?php
//Footer
require_once 'includes/footer.php';
?>