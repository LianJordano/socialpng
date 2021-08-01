<div class="contenedor">

    <h4>Mi perfil</h4>



    <form class="perfil" action="<?=URL?>usuario/editarUsuario" method="POST" enctype="multipart/form-data">

    <div class="perfil__foto">
        <img src="<?=URL?>uploads/<?=$_SESSION["usuario"]->profile_pic?>" alt="">
    </div>

        <div class="perfil__inputs">
            <input type="hidden" name="id" value="<?=$_SESSION["usuario"]->uid?>">
            <div class="perfil__bloque">
                <label class="perfil__label" for="">Nombre Completo</label>
                <input class="perfil__input" type="text" name="nombre" value="<?=$_SESSION["usuario"]->full_name?>">
            </div>

            <div class="perfil__bloque">
                <label class="perfil__label" for="">Correo Electronico</label>
                <input class="perfil__input" type="email" name="correo" value="<?=$_SESSION["usuario"]->email?>">
            </div>

            <div class="perfil__bloque">
                <label class="perfil__label" for="">Nombre de usuario</label>
                <input class="perfil__input" type="text" name="usuario" value="<?=$_SESSION["usuario"]->username?>">
            </div>

            <div class="perfil__bloque">
                <label class="perfil__label" for="">Foto</label>
                <input class="perfil__input" type="file" name="foto" >
            </div>

            <div class="perfil__bloque perfil__bloque--perfil">
                <input class="boton__perfil" type="submit" value="Actualizar datos">
            </div>

            
        </div>


    </form>


    <div class="perfil__iconos">
        <!-- <a href=""><i class="fas fa-users perfil__iconos_icono"></i>&nbsp;&nbsp;&nbsp;<span class="perfil__icono_span">1</span> </a> -->
        <a href="<?=URL?>mensaje/misMensajes"><i class="fas fa-book-reader perfil__iconos_icono"></i>&nbsp;&nbsp;&nbsp;<span class="perfil__icono_span"><?=$total["cantidad"]?></span>  </a>
        </div>

</div>