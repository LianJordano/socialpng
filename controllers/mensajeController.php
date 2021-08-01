<?php

require_once("models/mensajeModel.php");
require_once("models/mensaje_x_likesModel.php");
class MensajeController
{

    public function index()
    {
    }

    public function crearMensaje()
    {

        require_once("views/mensaje/crearMensaje.php");
    }

    public function crear()
    {
        $fecha = date("dmyhms");
        $mensaje = $_POST["mensaje"];
        $usuario_id = $_SESSION["usuario"]->uid;
        $foto = $_FILES["foto"];
        $ip = $_SERVER['REMOTE_ADDR'];

        $fotoNombre = $fecha . $foto["name"];
        $tmp_foto = $foto["tmp_name"];

        move_uploaded_file($tmp_foto, "uploads/" . $fotoNombre);

        $crearMensaje = new MensajeModel();
        $crearMensaje->setMessage($mensaje);
        $crearMensaje->setUid_fk($usuario_id);
        $crearMensaje->setIp($ip);
        $crearMensaje->setUploads($fotoNombre);
        $crear = $crearMensaje->crearMensaje();

        if ($crear) {
            header("location:" . URL . "usuario/main");
        }
    }

    public function eliminarMensaje()
    {

        if (isset($_GET)) {
            $id = $_GET["id"];
            $eliminarMensaje = new MensajeModel();
            $eliminarMensaje->setMsg_id($id);
            $eliminar = $eliminarMensaje->eliminarMensaje();
            if ($eliminar) {
                header("location:" . URL . "usuario/main");
            }
        }
    }

    public function editarMensaje()
    {

        if (isset($_GET)) {
            $id = $_GET["id"];
            $editarMensaje = new MensajeModel();
            $editarMensaje->setMsg_id($id);
            $mensaje = $editarMensaje->consultarUnMensajes()->fetch();

            require_once("views/mensaje/editarMensajeVista.php");
        }
    }

    public function editarEsteMensaje()
    {

        if (isset($_POST)) {
            $fecha = date("dmyhms");
            $mensaje = $_POST["mensaje"];
            $foto = $_FILES["foto"];
            $id = $_POST["msg_id"];

            $editarMensaje = new MensajeModel();

            if ($foto["name"] != "") {

                $fotoNombre = $fecha . $foto["name"];
                $tmp_foto = $foto["tmp_name"];
                move_uploaded_file($tmp_foto, "uploads/" . $fotoNombre);
                $editarMensaje->setUploads($fotoNombre);
                $editarMensaje->setMessage($mensaje);
                $editarMensaje->setMsg_id($id);
                $editar = $editarMensaje->editarMensajeConfoto();
                if ($editar) {
                    header("location:" . URL . "usuario/main");
                }
            } else {

                $editarMensaje->setMessage($mensaje);
                $editarMensaje->setMsg_id($id);
                $editar = $editarMensaje->editarMensajeSinFoto();
                if ($editar) {
                    header("location:" . URL . "usuario/main");
                }
            }
        }
    }


    public function likear()
    {

        if (isset($_GET)) {
            $id = $_GET["id"];
            $id_usu = $_SESSION["usuario"]->uid;

            $like = new Mensajes_x_LikesModel();
            $like->setMsg_id_fk($id);
            $like->setUid_fk($id_usu);
            $validarLike = $like->consultarLikesUsuario();

            if ($validarLike) {

                $editarMensaje = new MensajeModel();
                $editarMensaje->setMsg_id($id);
                $dislike = $editarMensaje->dislikearMensaje();
                $like->borrarLike();
                if ($dislike) {
                    header("location:" . URL . "usuario/main");
                }
            } elseif($validarLike==false) {

                $editarMensaje = new MensajeModel();
                $editarMensaje->setMsg_id($id);
                $likear = $editarMensaje->likearMensaje();
                $like->like();
                if ($likear) {
                    header("location:" . URL . "usuario/main");
                }
            }
        }
    }

    public function misMensajes(){

        $misMensajes = new MensajeModel();
        $id =  $_SESSION["usuario"]->uid;
        $misMensajes->setUid_fk($id);
        $mensajes = $misMensajes->consultarMisMensajes();
        
     
        require_once("views/mensaje/misMensajes.php");

    }

    public function verMensaje(){

        $idMensaje=$_GET["id"];
        $mensaje = new MensajeModel();
        $mensaje->setMsg_id($idMensaje);
        $elemento = $mensaje->consultarUnMensajes()->fetch();
        require_once("views/mensaje/verMensaje.php");
    }

}
