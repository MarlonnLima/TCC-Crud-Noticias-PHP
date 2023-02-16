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
        <form class ="formulario" action="php_action/update.php" method = "POST" enctype = "multipart/form-data">
        <h1 class = "titulo">Cadastrar Noticia</h1>
            <div class ="input-container">
                <div>
                    <input type="hidden" name="id" value = "<?php echo $dados['id']?>" required>
                </div>
                <div>
                    <input type="text" name="titulo" id="titulo" class ="fundo-roxo-40" maxlength="65" placeholder = "  Titulo" value = "<?php echo $dados['titulo']?>" required>
                </div>
                <div>
                    <input type="text" name="categoria" id="categoria" class ="fundo-roxo-60" maxlength = "20" placeholder = "  Categoria" value = "<?php echo $dados['categoria']?>" required>
                </div>
                <div>   
                    <textarea name="descricao" id="descricao" cols="94" rows="6" required placeholder = "  Descrição"><?php echo $dados['descricao']?></textarea>
                </div>
            </div>
                <div class ="area-buttons-cadastro">
                    <button type = "submit" name = "btn-atualizar" class ="botao texto-branco fundo-roxo w-100">Atualizar</button>
                    <a href = "admin.index.php" class ="botao texto-branco fundo-roxo w-100 d-block text-center">Noticias</a>
                </div>
        </form>
    </div>
</div>


<?php
include_once 'includes/footer.php';
else:
    header("Location: index.php");
endif; // da session
endif; // do isset
?>