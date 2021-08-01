<?php 
    class DB{

        public function __construct()
        {
            $this->host=HOST;
            $this->db=DBNAME;
            $this->user=USER;
            $this->pass=PASS;
            $this->charset=CHARSET;
        }

        public function connect(){
            try {
                $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=". $this->charset;

                $options = [PDO::ATTR_ERRMODE   =>  PDO::ERRMODE_EXCEPTION,
                            PDO::ATTR_EMULATE_PREPARES  => false];

                $pdo = new PDO($connection, $this->user, $this->pass, $options);

                return $pdo;

            } catch (PDOException $e) {
                print_r("Error connection ". $e->getMessage());
            }
        }

    }

