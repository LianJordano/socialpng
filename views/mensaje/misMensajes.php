<div class="contenedor">

    <h2>Mis publicaciones</h2>
    <table class="tabla_publicaciones">

        <tr>
            <th>Imagen</th>
            <th>Mensaje</th>
            <th>Me gusta</th>
            <th>Compartido</th>
            <th>Creado</th>
            <th>Acciones</th>
        </tr>

        <?php foreach ($mensajes as $mensaje): ?>
        <tr>
            <td><img class="tabla_publicaciones_img" src="<?=URL?>uploads/<?=$mensaje["uploads"]?>" alt=""></td>
            <td><?=$mensaje["message"]?></td>
            <td><?=$mensaje["like_count"]?></td>
            <td><?=$mensaje["share_count"]?></td>
            <td><?=$mensaje["created"]?></td>
            <td>
            <a href="<?=URL?>mensaje/editarMensaje&id=<?=$mensaje["msg_id"]?>"><i class="far fa-edit mensaje_icono--editar"></i></a>
                        <a href="<?=URL?>mensaje/eliminarMensaje&id=<?=$mensaje["msg_id"]?>"><i class="far fa-trash-alt mensaje_icono--eliminar"></i></a>
            </td>
        </tr>
        <?php endforeach; ?>


    </table>






</div>