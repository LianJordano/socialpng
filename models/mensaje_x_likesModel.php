<?php 

    class Mensajes_x_LikesModel extends DB{

        private $like_id;
        private $msg_id_fk;
        private $uid_fk;
        private $created;


        public function like(){

            $sql = "INSERT INTO message_like (msg_id_fk,uid_fk,created) VALUES (:msg_id_fk,:uid_fk,CURDATE())";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindValue(':msg_id_fk',$this->getMsg_id_fk());
            $stmt->bindValue(':uid_fk',$this->getUid_fk());
            $stmt->execute();
            return $stmt;

        }

        public function consultarLikesUsuario(){
            $sql = "SELECT * FROM message_like WHERE msg_id_fk=:msg_id_fk AND uid_fk=:uid_fk";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindValue(':msg_id_fk',$this->getMsg_id_fk());
            $stmt->bindValue(':uid_fk',$this->getUid_fk());
            $stmt->execute();
            $count=$stmt->rowCount();
            $like=$stmt->fetch(PDO::FETCH_OBJ);
            return $like;
        }

        public function borrarLike(){
            $sql = "DELETE FROM message_like WHERE msg_id_fk=:msg_id_fk AND uid_fk=:uid_fk";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindValue(':msg_id_fk',$this->getMsg_id_fk());
            $stmt->bindValue(':uid_fk',$this->getUid_fk());
            $stmt->execute();
            return $stmt;
        }



        /**
         * Get the value of like_id
         */ 
        public function getLike_id()
        {
                return $this->like_id;
        }

        /**
         * Set the value of like_id
         *
         * @return  self
         */ 
        public function setLike_id($like_id)
        {
                $this->like_id = $like_id;

                return $this;
        }

        /**
         * Get the value of msg_id_fk
         */ 
        public function getMsg_id_fk()
        {
                return $this->msg_id_fk;
        }

        /**
         * Set the value of msg_id_fk
         *
         * @return  self
         */ 
        public function setMsg_id_fk($msg_id_fk)
        {
                $this->msg_id_fk = $msg_id_fk;

                return $this;
        }

        /**
         * Get the value of uid_fk
         */ 
        public function getUid_fk()
        {
                return $this->uid_fk;
        }

        /**
         * Set the value of uid_fk
         *
         * @return  self
         */ 
        public function setUid_fk($uid_fk)
        {
                $this->uid_fk = $uid_fk;

                return $this;
        }

        /**
         * Get the value of created
         */ 
        public function getCreated()
        {
                return $this->created;
        }

        /**
         * Set the value of created
         *
         * @return  self
         */ 
        public function setCreated($created)
        {
                $this->created = $created;

                return $this;
        }
    }




?>