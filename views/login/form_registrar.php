<link rel="stylesheet" href="<?= CSS ?>">
<video autoplay muted loop id="video">
  <source src="<?=URL?>assets/videos/videoFondo.mp4" type="video/mp4">
</video>
<div class="contenedor">

        <form class="formulario_registro" action="<?=URL?>usuario/registrar" method="post"  enctype="multipart/form-data" autocomplete="off">
        <h2 class="formulario__login_titulo centrar-texto no-margin">Registrarse</h2>
            <div class="formulario__login_bloque">
                <label class="formulario__login_label" for="">Nombre Completo</label>
                <input required class="formulario__login_input" name="nombre" type="text">
            </div>

            <div class="formulario__login_bloque">
                <label class="formulario__login_label" for="">Correo Electronico</label>
                <input required class="formulario__login_input" name="correo" type="email">
            </div>

            <div class="formulario__login_bloque">
                <label class="formulario__login_label" for="">Nombre de usuario</label>
                <input required class="formulario__login_input" name="usuario" type="text">
            </div>

            <div class="formulario__login_bloque">
                <label class="formulario__login_label" for="">Contraseña</label>
                <input required class="formulario__login_input" name="password" type="password">
            </div>

            <div class="formulario__login_bloque">
                <label class="formulario__login_label" for="">Foto</label>
                <input class="formulario__login_input" name="foto" type="file">
            </div>

      

            <div class="formulario__login_bloque">
                <input class="boton" type="submit" value="Registrarse">
            </div>

      
        </form>

 
</div>

