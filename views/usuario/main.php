<div class="contenedor">

    <div class="mensaje__extra">
        <h2 class="mensaje__titulo">Mensajes</h2>
        <a class="mensaje__boton" href="<?= URL ?>mensaje/crearMensaje">Crear mensaje</a>
    </div>
    <span class="mensaje__span"></span>
    <div class="mensajes">

        <?php foreach ($mensajes as $mensaje) : ?>

            <div class="mensajes__mensaje">
                <div class="mensajes__informacion">
                    <span class="mensaje__foto_creador"><img src="<?= URL ?>uploads/<?= $mensaje["profile_pic"] ?>" alt=""></span>
                    <span class="mensaje__creador"><?= $mensaje["full_name"] ?></span>
                </div>

                <div class="mensaje__cuerpo">
                    <p><?= substr($mensaje["message"], 0, 39) ?> <a href="<?=URL?>mensaje/verMensaje&id=<?=$mensaje["msg_id"]?>">... <small class="ver_mas">Ver mas</small></a></p>
                </div>
                <div class="mensaje__archivo">
                    <img class="mensaje__imagen" src="<?= URL ?>uploads/<?= $mensaje["uploads"] ?>" alt="imagen-mensaje">
                </div>

                <div class="mensaje__iconos">
              <!--       <?php if ($mensaje["uid_fk"] != $_SESSION["usuario"]->uid) : ?>
                        <a href=""><i class="fas fa-user-friends"></i></a>
                    <?php endif; ?>
 -->
                    <a href="<?=URL?>mensaje/likear&id=<?=$mensaje["msg_id"]?>"><i class="far fa-thumbs-up"></i></a><span><?=$mensaje["like_count"]?></span>
                 <!--    <a href=""><i class="fas fa-retweet"></i></a> -->
                    <?php if ($mensaje["uid_fk"] == $_SESSION["usuario"]->uid) : ?>
                        <a href="<?=URL?>mensaje/editarMensaje&id=<?=$mensaje["msg_id"]?>"><i class="far fa-edit mensaje_icono--editar"></i></a>
                        <a href="<?=URL?>mensaje/eliminarMensaje&id=<?=$mensaje["msg_id"]?>"><i class="far fa-trash-alt mensaje_icono--eliminar"></i></a>
                    <?php endif; ?>
                </div>

            </div>


        <?php endforeach; ?>

    </div>




</div>