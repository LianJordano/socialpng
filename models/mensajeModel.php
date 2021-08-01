<?php 

    class MensajeModel extends DB{

        private $msg_id;
        private $message;
        private $uid_fk;
        private $ip;
        private $created;
        private $uploads;
        private $like_count;
        private $comment_count;
        private $share_count;


        public function crearMensaje(){
                $sql = "INSERT INTO messages (message,uid_fk,ip,created,uploads) VALUES (:message,:uid_fk,:ip,CURDATE(),:uploads)";
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindValue(':message',$this->getMessage());
                $stmt->bindValue(':uid_fk',$this->getUid_fk());
                $stmt->bindValue(':ip',$this->getIp());
                $stmt->bindValue(':uploads',$this->getUploads());
                $stmt->execute();
                return $stmt;
        }


        public function consultarMensajes(){
            $sql = "SELECT M.*,U.* FROM messages M INNER JOIN users U ON M.uid_fk=U.uid;";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt;
        }

        public function consultarMisMensajes(){
                $sql = "SELECT * FROM messages WHERE uid_fk=:uid_fk";
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindValue(':uid_fk',$this->getUid_fk());
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                return $stmt;
            }

        public function consultarUnMensajes(){
            $sql = "SELECT M.*,U.* FROM messages M INNER JOIN users U ON M.uid_fk=U.uid WHERE M.msg_id=:msg_id ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindValue(':msg_id',$this->getMsg_id());
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt;
        }

        public function totalMensajes(){
                $sql = "SELECT count(*) AS 'cantidad' FROM messages WHERE uid_fk=:uid_fk ";
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindValue(':uid_fk',$this->getUid_fk());
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                return $stmt;
            }

        public function editarMensajeConfoto(){
                $sql = "UPDATE messages SET 
                message=:message,
                uploads=:uploads 
                WHERE msg_id=:msg_id";
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindValue(':msg_id',$this->getMsg_id());
                $stmt->bindValue(':message',$this->getMessage());
                $stmt->bindValue(':uploads',$this->getUploads());
                $stmt->execute();
                return $stmt;
        }

        public function editarMensajeSinfoto(){
                $sql = "UPDATE messages SET 
                message=:message
                WHERE msg_id=:msg_id";
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindValue(':msg_id',$this->getMsg_id());
                $stmt->bindValue(':message',$this->getMessage());
                $stmt->execute();
                return $stmt;
        }


    public function eliminarMensaje(){
        $sql = "DELETE FROM messages WHERE msg_id=:msg_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(':msg_id',$this->getMsg_id());
        $stmt->execute();
        return $stmt;
    }


    public function likearMensaje(){
        $sql = "UPDATE messages SET 
        like_count=like_count + 1
        WHERE msg_id=:msg_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(':msg_id',$this->getMsg_id());
        $stmt->execute();
        return $stmt;
    }

    public function dislikearMensaje(){
        $sql = "UPDATE messages SET 
        like_count=like_count - 1
        WHERE msg_id=:msg_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(':msg_id',$this->getMsg_id());
        $stmt->execute();
        return $stmt;
    }



        /**
         * Get the value of msg_id
         */ 
        public function getMsg_id()
        {
                return $this->msg_id;
        }

        /**
         * Set the value of msg_id
         *
         * @return  self
         */ 
        public function setMsg_id($msg_id)
        {
                $this->msg_id = $msg_id;

                return $this;
        }

        /**
         * Get the value of message
         */ 
        public function getMessage()
        {
                return $this->message;
        }

        /**
         * Set the value of message
         *
         * @return  self
         */ 
        public function setMessage($message)
        {
                $this->message = $message;

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
         * Get the value of ip
         */ 
        public function getIp()
        {
                return $this->ip;
        }

        /**
         * Set the value of ip
         *
         * @return  self
         */ 
        public function setIp($ip)
        {
                $this->ip = $ip;

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

        /**
         * Get the value of uploads
         */ 
        public function getUploads()
        {
                return $this->uploads;
        }

        /**
         * Set the value of uploads
         *
         * @return  self
         */ 
        public function setUploads($uploads)
        {
                $this->uploads = $uploads;

                return $this;
        }

        /**
         * Get the value of like_count
         */ 
        public function getLike_count()
        {
                return $this->like_count;
        }

        /**
         * Set the value of like_count
         *
         * @return  self
         */ 
        public function setLike_count($like_count)
        {
                $this->like_count = $like_count;

                return $this;
        }

        /**
         * Get the value of comment_count
         */ 
        public function getComment_count()
        {
                return $this->comment_count;
        }

        /**
         * Set the value of comment_count
         *
         * @return  self
         */ 
        public function setComment_count($comment_count)
        {
                $this->comment_count = $comment_count;

                return $this;
        }

        /**
         * Get the value of share_count
         */ 
        public function getShare_count()
        {
                return $this->share_count;
        }

        /**
         * Set the value of share_count
         *
         * @return  self
         */ 
        public function setShare_count($share_count)
        {
                $this->share_count = $share_count;

                return $this;
        }
    }
