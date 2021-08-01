<?php 


    class LoginModel extends DB{

        private $uid;
        private $username;
        private $password;


        function login(){

            $sql = "SELECT * FROM users WHERE username=:username AND password=:password";
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindValue(':username',$this->getUsername());
                $stmt->bindValue(':password',$this->getPassword());
                $stmt->execute();
                $count=$stmt->rowCount();
                $usuario=$stmt->fetch(PDO::FETCH_OBJ);
                return $usuario;
        }



        /**
         * Get the value of username
         */ 
        public function getUsername()
        {
                return $this->username;
        }

        /**
         * Set the value of username
         *
         * @return  self
         */ 
        public function setUsername($username)
        {
                $this->username = $username;

                return $this;
        }

        /**
         * Get the value of uid
         */ 
        public function getUid()
        {
                return $this->uid;
        }

        /**
         * Set the value of uid
         *
         * @return  self
         */ 
        public function setUid($uid)
        {
                $this->uid = $uid;

                return $this;
        }

        /**
         * Get the value of password
         */ 
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }
    }





?>