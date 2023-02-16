<?php
require_once 'includes/header.php'
?>

<form class ="formulario" action="php_action/register.php" method = "POST" enctype = "multipart/form-data">
            <div class ="input-container">
            <h1 class = "titulo">Cadastrar</h1>
                <div>
                    <input type="text" name="nome" id="titulo" placeholder = "  Nome" required>
                </div>
                <div>
                    <input type="text" name="usuario" id="titulo" placeholder = "  Email" required>
                </div>
                <div>
                    <input type="text" name="senha" id="categoria" placeholder = "  senha" required>
                </div>
            </div>            

            <div class ="area-buttons-cadastro">
                <button type = "submit" name = "btn-cadastrar" class ="botao texto-branco fundo-roxo buttons-cadastro w-100">Cadastrar</button>
             </div>
        </form>
    </div>
</div>