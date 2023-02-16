<?php
require_once 'includes/header.php'
?>

<form class ="formulario" action="php_action/logar.php" method = "POST" enctype = "multipart/form-data">
            <div class ="input-container">
            <h1 class = "titulo">Entrar</h1>
                <div>
                    <input type="text" name="usuario" id="titulo" placeholder = "  Usuario"required>
                </div>
                <div>
                    <input type="text" name="senha" id="categoria" placeholder = "  senha" required>
                </div>
            </div>            

            <div class ="area-buttons-cadastro">
                <button type = "submit" name = "btn-logar" class ="botao texto-branco fundo-roxo buttons-cadastro">Entrar</button>
                <a href ="cadastrar.php" class ="botao texto-branco fundo-roxo buttons-cadastro">Cadastrar</a>
             </div>
        </form>
    </div>
</div>