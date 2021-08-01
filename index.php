<?php 
date_default_timezone_set('America/bogota');
  session_start();

    require_once("config/parameters.php");
    require_once("config/db.php");

      if(CONTROLLER_DEFAULT!="loginController"){
        include_once("views/plantilla/header.php");
      }
    require_once("autoload.php");
    require_once("helpers/utils.php");

    

    ob_start();
  
    if (!isset($_GET["controller"]) && !isset($_GET["action"])) {
      
        $controlador_default = CONTROLLER_DEFAULT;
        $action = ACTION_DEFAULT;

        $nombre_controlador = new $controlador_default();
        $nombre_controlador->$action();
      } else {


        if (isset($_GET["controller"])) {
          $nombre_controlador = $_GET["controller"] . "Controller";
          if($nombre_controlador!="loginController"){
            include_once("views/plantilla/header.php");
          }
        } else {
          $error = new ErrorController();
          $error->index();
          exit();
        }


        if (class_exists($nombre_controlador)) {
          $controlador = new $nombre_controlador();
       

          if (isset($_GET["action"]) && method_exists($controlador, $_GET["action"])) {
            $action = $_GET["action"];
            $controlador->$action();
          } else {
            $error = new ErrorController();
            $error->index();
          }
        } else {
          $error = new ErrorController();
          $error->index();
        }
      }

      include_once("views/plantilla/footer.php");
      
    ob_end_flush();
?>