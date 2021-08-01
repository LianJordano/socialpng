<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= COMPANY ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= NORMALIZE ?>">
    <link rel="stylesheet" href="<?= CSS ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet"> 

    <script src="https://kit.fontawesome.com/36668bc8ff.js" crossorigin="anonymous"></script>
</head>

<body>
    
    <header  class="header">

        <div class="header__logo">
            <a href="<?=URL?>usuario/main""><h1 class="header__logo_logo">Social.<span class="header__logo_span">PNG</span></h1></a>
        </div>

        <div class="header__navegacion navegacion">
            <?php if(isset($_SESSION["usuario"])): ?>
                <a class="header_navegacion_link" href="<?=URL?>usuario/perfil"><i class="fas fa-user-alt"></i> <?=$_SESSION["usuario"]->full_name?></a>
            <?php endif; ?>

            <a class="header_navegacion_link" href="<?=URL?>usuario/main"><i class="fas fa-home"></i> Inicio</a>
            <!-- <a class="header_navegacion_link" href=""><i class="fas fa-users"></i> Amigos</a> -->
            <a class="header_navegacion_link" href="<?=URL?>mensaje/misMensajes"><i class="fas fa-book-reader"></i> Mis Publicaciones</a>

            <?php if(isset($_SESSION["usuario"])): ?>
            <a class="header_navegacion_link" href="<?=URL?>login/cerrar_sesion"><i class="fas fa-door-open"></i> Cerrar Sesion</a>
            <?php endif; ?>
        </div>

    </header>





