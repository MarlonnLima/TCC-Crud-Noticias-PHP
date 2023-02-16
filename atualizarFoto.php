<?php
//Sessão
session_start();
//verificar sessão
if (isset($_SESSION)):
    if ($_SESSION['admin'] == true):


include_once 'includes/header.php';
include_once 'php_action/db_connect.php';
?>

<?php

if (isset($_GET['id'])):
    $id = mysqli_escape_string($connect, $_GET['id']);
    $sql = "SELECT * FROM noticias WHERE id = $id";
    $resultado = mysqli_query($connect, $sql);

    $dados = mysqli_fetch_array($resultado);
else:
    echo "não funciona";    
endif;

?>
        <h1 class = "titulo">Atualizar Imagem</h1>
        <form class ="formulario" action="php_action/update.php" method = "POST" enctype = "multipart/form-data">
                <input type = "hidden" value = "<?php echo $dados['id']?>" name = "id">
                

                <div class ="container-img">
                    <label id = "label-imagem" class = "texto-roxo w-100 text-center troca-foto mx-auto" for="imagem">
                    <i class="fa-sharp fa-solid fa-camera foto"></i>
                    <input type="file" name = "imagem" id = "imagem" required> 
                    </label>
                </div>
            <div class ="container w-100">
                <button type = "submit" name = "btn-atualizar-foto" class ="botao texto-branco fundo-roxo w-100">Atualizar</button>
                <a href = "index.php" class ="botao texto-branco fundo-roxo text-center d-block w-100">Listar Noticias</a>
            </div>
        </form>
    </div>
</div>


<?php
include_once 'includes/footer.php';
else:
    header("Location: admin.index.php");
endif; // da session
endif; // do isset
?>