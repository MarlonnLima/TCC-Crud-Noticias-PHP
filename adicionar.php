<?php
//Sessão
session_start();
//verificar sessão
if (isset($_SESSION)):
    if ($_SESSION['admin'] == true):

        include_once 'includes/header.php'
?>

        <form class ="formulario" action="php_action/create.php" method = "POST" enctype = "multipart/form-data">
        <h1 class = "titulo">Cadastrar Noticia</h1>
            <div class ="input-container">
                <div>
                    <input class = "fundo-roxo-40" type="text" name="titulo" id="titulo" maxlength="65" placeholder = "  Titulo"required>
                </div>
                <div>
                    <input class = "fundo-roxo-60" type="text" name="categoria" id="categoria" maxlength = "20" placeholder = "  Categoria" required>
                </div>
                <div>   
                    <textarea class = "fundo-roxo-80" name="descricao" id="descricao" cols="94" rows="6" placeholder = "  Descrição"></textarea>
                </div>
            </div>

            <div class ="container-img">
                <label id = "label-imagem" class = "texto-roxo" for="imagem">Inserir imagem  <i class="fa-solid fa-camera"></i>
                <input type="file" name = "imagem" id = "imagem" required> 
                 </label>
            </div>

            <div class ="area-buttons-cadastro">
                <button type = "submit" name = "btn-cadastrar" class ="botao texto-branco fundo-roxo buttons-cadastro">Cadastrar</button>
                <a class = "botao texto-branco buttons-cadastro fundo-roxo" href = "index.php">Noticias</a>
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