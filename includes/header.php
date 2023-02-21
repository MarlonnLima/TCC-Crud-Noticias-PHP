<?php
date_default_timezone_set("America/Sao_Paulo");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/2495/2495007.png">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://kit.fontawesome.com/15f4dde997.css" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
    <title>Dev News</title>
</head>
<body>
    <header>
        <div class = "cabecalho fundo-roxo">
            <a class ="texto-branco"href = "index.php"><h2>Dev News</h2></a>
            <div class ="container-data-hora texto-branco gap20">
                <div>
                <span><?php
                $semana = array(
                    'Sun' => 'Domingo ', 
                    'Mon' => 'Segunda-Feira ',
                    'Tue' => 'Terca-Feira ',
                    'Wed' => 'Quarta-Feira ',
                    'Thu' => 'Quinta-Feira ',
                    'Fri' => 'Sexta-Feira ',
                    'Sat' => 'Sábado '
                );
                 echo $semana[date('D')] . ""; 
                 echo date('d/m, Y');?></span>
                <span class ="detalhe-hora texto-roxo"><?php echo date('H:i:s');?></span>
                </div>
            </div>
            <?php 
            if(isset($_SESSION['nome_user'])):
                echo "<span class = 'texto-branco'>Olá ". $_SESSION['nome_user'] ."</span>";
                echo "<a class = 'texto-branco' href = 'php_action/logout.php'>Sair</a>";
            else: 
                echo "<a class = 'texto-branco' href='login.php'>Logue ou cadastre-se  <i class='fa-sharp fa-solid fa-user my-2'></i></a>";
            endif;
            ?></a>
        </div>
        
    </header>

    <!-- Essa tag script foi inserida aqui para que o usuário visualize diretamente a edição da página 
    com wyswig sem ter que esperar carregar-->
    <script src="https://cdn.tiny.cloud/1/clpzqoji9loof80fec6sdfo023w2rphyf4sarpwjsl8km8uq/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
     <script>
    tinymce.init({
      selector: 'textarea#descricao',
      menubar: false,
    });
  </script>