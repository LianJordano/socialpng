<div class="contenedor">

<h2 class="centrar-texto">Crea tu mensaje</h2>

<form class="formulario_crear_mensaje" action="<?=URL?>mensaje/crear" method="POST" enctype="multipart/form-data">

    <div class="formulario_crear_mensaje__bloque">
            <label class="formulario_crear_label" for="">Mensaje</label>
            <textarea class="formulario_crear_textarea" name="mensaje" id="" ></textarea>
    </div>

    <div class="formulario_crear_mensaje__bloque--file">
            <label class="formulario_crear_label" for="">Adjunta Imagen</label>
            <input class="formulario_crear_file" type="file" name="foto" id="">
    </div>

    <div class="formulario_crear_mensaje__bloque">
        <input class="formulario_crear_boton" type="submit" value="Crear Mensaje">
    </div>

</form>


</div>