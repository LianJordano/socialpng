<?php 

    class Utils{

        public static function validarCamposVacios($campo){
            if(isset($_POST[$campo]) && $_POST[$campo]!="")
            {
                $resultado = $_POST[$campo];
            }else{
                $resultado = null;
            }
            return $resultado;
        }

        public static function ExisteFoto($foto,$modulo=null){
           $resultado = is_file($_FILES[$foto]["tmp_name"]);
           if($resultado){
                $fecha = date("dmyhms");
                $nombreFoto = $fecha.$_FILES[$foto]["name"];
                $tmpFoto = $_FILES[$foto]["tmp_name"];
                move_uploaded_file($tmpFoto,"uploads/".$nombreFoto);
           }else{

            if($modulo){
                $nombreFoto="default".$modulo.".jpg";
            }else{
                $nombreFoto="default.jpg";
            }
           }
           return $nombreFoto;
        }

        public static function alertaCrear($modulo,$fallo = null){
            $mod = strtoupper($modulo);
            if(!$fallo){
                return $_SESSION[$modulo]=["exito"=>"<b>$mod</b>, creada/o exitosamente"];
            }else{
                return $_SESSION[$modulo]=["fallo"=>"Fallo al crear <b>$mod</b>"];
            }
        }

        public static function matarSesion($sesion){
            unset($_SESSION[$sesion]);
        }


    }





?>