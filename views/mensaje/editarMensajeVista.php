<div class="contenedor">

<h2 class="centrar-texto">Edita tu mensaje</h2>

<form class="formulario_crear_mensaje" action="<?=URL?>mensaje/editarEsteMensaje" method="POST" enctype="multipart/form-data">
    <div class="editar-contenedor">
        <input type="hidden" value="<?=$_GET["id"]?>" name="msg_id">
        <div class="formulario_crear_mensaje__bloque">
                <label class="formulario_crear_label" for="">Mensaje</label>
                <textarea class="formulario_crear_textarea" name="mensaje" id=""><?=$mensaje["message"]?></textarea>
        </div>
        <img class="formulario__editar_imagen" src="<?=URL?>uploads/<?=$mensaje["uploads"]?>" alt="">
    </div>

    <div class="formulario_crear_mensaje__bloque--file">
            <label class="formulario_crear_label" for="">Adjunta Imagen</label>
            <input class="formulario_crear_file" type="file" name="foto" id="">
    </div>

    <div class="formulario_crear_mensaje__bloque">
        <input class="formulario_crear_boton" type="submit" value="Editar Mensaje">
    </div>

</form>


</div>