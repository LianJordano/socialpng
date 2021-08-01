<?php 

    class UsuarioModel extends DB{

        private $uid;
        private $username;
        private $password;
        private $email;
        private $profile_pic;
        private $friend_count;
        private $status;
        private $full_name;


        public function registrarUsuario(){
            $sql = "INSERT INTO users (username,password,email,profile_pic,full_name) VALUES (:username,:password,:email,:profile_pic,:full_name)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindValue(':username',$this->getUsername());
            $stmt->bindValue(':password',$this->getPassword());
            $stmt->bindValue(':email',$this->getEmail());
            $stmt->bindValue(':profile_pic',$this->getProfile_pic());
            $stmt->bindValue(':full_name',$this->getFull_name());
            $stmt->execute();
            return $stmt;
    }

    public function ActivarEstado(){
        $sql = "UPDATE users SET 
        status=:status
        WHERE username=:username AND password=:password ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(':username',$this->getUsername());
        $stmt->bindValue(':password',$this->getPassword());
        $stmt->bindValue(':status',$this->getStatus());
        $stmt->execute();
        return $stmt;

    }

    public function DesactivarEstado(){
        $sql = "UPDATE users SET 
        status=:status
        WHERE username=:username AND password=:password ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(':username',$this->getUsername());
        $stmt->bindValue(':password',$this->getPassword());
        $stmt->bindValue(':status',$this->getStatus());
        $stmt->execute();
        return $stmt;

    }

    public function editarPerfilConFoto(){

                $sql = "UPDATE users SET 
                username=:username,
                email=:email,
                full_name=:full_name,
                profile_pic=:profile_pic 
                WHERE uid=:uid";
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindValue(':uid',$this->getUid());
                $stmt->bindValue(':username',$this->getUsername());
                $stmt->bindValue(':email',$this->getEmail());
                $stmt->bindValue(':full_name',$this->getFull_name());
                $stmt->bindValue(':profile_pic',$this->getProfile_pic());
                $stmt->execute();
                return $stmt;

    }

    public function editarPerfilSinFoto(){

        $sql = "UPDATE users SET 
        username=:username,
        email=:email,
        full_name=:full_name
        WHERE uid=:uid";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(':uid',$this->getUid());
        $stmt->bindValue(':username',$this->getUsername());
        $stmt->bindValue(':email',$this->getEmail());
        $stmt->bindValue(':full_name',$this->getFull_name());
        $stmt->execute();
        return $stmt;

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

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of profile_pic
         */ 
        public function getProfile_pic()
        {
                return $this->profile_pic;
        }

        /**
         * Set the value of profile_pic
         *
         * @return  self
         */ 
        public function setProfile_pic($profile_pic)
        {
                $this->profile_pic = $profile_pic;

                return $this;
        }

        /**
         * Get the value of friend_count
         */ 
        public function getFriend_count()
        {
                return $this->friend_count;
        }

        /**
         * Set the value of friend_count
         *
         * @return  self
         */ 
        public function setFriend_count($friend_count)
        {
                $this->friend_count = $friend_count;

                return $this;
        }

        /**
         * Get the value of status
         */ 
        public function getStatus()
        {
                return $this->status;
        }

        /**
         * Set the value of status
         *
         * @return  self
         */ 
        public function setStatus($status)
        {
                $this->status = $status;

                return $this;
        }

        /**
         * Get the value of full_name
         */ 
        public function getFull_name()
        {
                return $this->full_name;
        }

        /**
         * Set the value of full_name
         *
         * @return  self
         */ 
        public function setFull_name($full_name)
        {
                $this->full_name = $full_name;

                return $this;
        }
    }
