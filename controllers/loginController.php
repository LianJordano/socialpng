<?php 

    require_once("models/loginModel.php");
    require_once("models/usuarioModel.php");
    class loginController{


        public function index(){
            require("views/login/login.php");
        }

        public function logear(){

            if(isset($_POST["usuario"]) && isset($_POST["password"])){

                if($_POST["usuario"]!=""){
                    $usuario = $_POST["usuario"];
                    $usuarioActivar = $_POST["usuario"];
                }else{
                    $usuario = null;
                }

                if($_POST["password"]!=""){
                    $password = $_POST["password"];
                }else{
                    $password = null;
                }

                if($usuario!=null && $password!=null){

                    $logear = new LoginModel();
                    $logear->setUsername($usuario);
                    $logear->setPassword($password);
                    $usuario = $logear->login();

                   if($usuario){
                       $estadoLogin = new UsuarioModel();
                       $estadoLogin->setUsername($usuarioActivar);
                       $estadoLogin->setPassword($password);
                       $estadoLogin->setStatus(1);
                       $estadoLogin->ActivarEstado();
                       
                       $_SESSION["usuario"] =$usuario;
                       header("location:".URL."usuario/main");
                   }else{
                       header("location:index");
                   }
                }
            }
        }   

        public function cerrar_sesion(){

                    $estadoLogin = new UsuarioModel();
                       $estadoLogin->setUsername($_SESSION["usuario"]->username);
                       $estadoLogin->setPassword($_SESSION["usuario"]->password);
                       $estadoLogin->setStatus(0);
                       $estadoLogin->DesactivarEstado();
                       

            unset($_SESSION["usuario"]);
            header("location:index");

        }

        public function form_registrar(){

            require_once("views/login/form_registrar.php");
            

        }

    }

?>