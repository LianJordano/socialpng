<link rel="stylesheet" href="<?= CSS ?>">

<style>
 
</style>
<video autoplay muted loop id="video">
  <source src="<?=URL?>assets/videos/videoFondo.mp4" type="video/mp4">
</video>
<div class="contenedor">

        <form class="formulario__login" action="<?=URL?>login/logear" method="post" autocomplete="off" >
            <h2 class="formulario__login_titulo centrar-texto no-margin">Iniciar Sesion</h2>
            <div class="formulario__login_bloque">
                <label class="formulario__login_label" for="">Usuario</label>
                <input class="formulario__login_input" name="usuario" type="text">
            </div>

            <div class="formulario__login_bloque">
                <label class="formulario__login_label" for="">Contraseña</label>
                <input class="formulario__login_input" name="password" type="password">
            </div>


            <div class="formulario__login_bloque">
                <input class="boton" type="submit" value="Iniciar Sesion">
                <a class="boton boton--registrarse" href="<?=URL?>login/form_registrar">Registrarse</a>
            </div>

        </form>

 
</div>

