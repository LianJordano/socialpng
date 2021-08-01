<?php 

    require_once("models/usuarioModel.php");
    require_once("models/mensajeModel.php");

    class UsuarioController{


        public function main(){

            $todosmensajes = new MensajeModel();
            $mensajes = $todosmensajes->consultarMensajes();
            require_once("views/usuario/main.php");

        }

        public function registrar(){

            if(isset($_POST)){

                $fecha = date("dmyhms");
                $nombre = $_POST["nombre"];
                $correo = $_POST["correo"];
                $usuario = $_POST["usuario"];
                $password = $_POST["password"];
                $foto = $_FILES["foto"];

                echo $nombreFoto = $fecha.$foto["name"];
                echo $tmp_name = $foto["tmp_name"];

                move_uploaded_file($tmp_name,"uploads/".$nombreFoto);


                $registrar = new UsuarioModel();
                $registrar->setFull_name($nombre);
                $registrar->setEmail($correo);
                $registrar->setUsername($usuario);
                $registrar->setPassword($password);
                $registrar->setProfile_pic($nombreFoto);
                $registro = $registrar->registrarUsuario();
                
                if($registro){
                    header("location:".URL."login/index");
                }
            }
        }

        public function perfil(){
            $mensajes = new MensajeModel();
            $id = $_SESSION["usuario"]->uid;
            $mensajes->setUid_fk($id);
            $total = $mensajes->totalMensajes()->fetch();
            require_once("views/usuario/miperfil.php");
        }

        public function editarUsuario(){

            if(isset($_POST)){
                $fecha = date("dmyhms");
                $id = $_POST["id"];
                $nombre = $_POST["nombre"];
                $correo = $_POST["correo"];
                $usuario = $_POST["usuario"];
                $foto = $_FILES["foto"];
                $nombreFoto = $fecha.$foto["name"];
                $tmpFoto = $foto["tmp_name"];

                if($foto["name"]!=""){

                    move_uploaded_file($tmpFoto,"uploads/".$nombreFoto);
                    $editar = new UsuarioModel();
                    $editar->setUid($id);
                    $editar->setFull_name($nombre);
                    $editar->setEmail($correo);
                    $editar->setUsername($usuario);
                    $editar->setProfile_pic($nombreFoto);
                    $edicion = $editar->editarPerfilConFoto();
                    
                    if($edicion){
                        $_SESSION["usuario"]->full_name = $editar->getFull_name();
                        $_SESSION["usuario"]->email = $editar->getEmail();
                        $_SESSION["usuario"]->username = $editar->getUsername();
                        $_SESSION["usuario"]->profile_pic = $editar->getProfile_pic();
                        header("location:".URL."usuario/perfil");
                    }

                }else{

                    $editar = new UsuarioModel();
                    $editar->setUid($id);
                    $editar->setFull_name($nombre);
                    $editar->setEmail($correo);
                    $editar->setUsername($usuario);
                    $edicion = $editar->editarPerfilSinFoto();
                    
                    if($edicion){
                        $_SESSION["usuario"]->full_name = $editar->getFull_name();
                        $_SESSION["usuario"]->email = $editar->getEmail();
                        $_SESSION["usuario"]->username = $editar->getUsername();
                        header("location:".URL."usuario/perfil");
                    }


                }

              

            }

        }

 

    }




?>