<?php
    class config {
        private static $pdo = NULL;

        public static function getConnexion(){
            if (!isset(self::$pdo)){
                try {
                    self::$pdo = new PDO(
                        "mysql:host=localhost;dbname=atelierPHP",'root','',
                        [
                            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                        ]
                    );
                    // echo 'connected to database successfully!';
                } catch (PDOException $e) {
                    die('connection failed! ' . $e->getMessage());
                }
            }
            return self::$pdo;
        }


    }

?>