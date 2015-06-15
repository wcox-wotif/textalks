<?php

class DB {
        
    public function connect() {

        $server = $_SERVER['SERVER_PORT'];
        if($server == '10') {
            $user = "TEX";
            $pwd = "R8rLdyDB9566J7hX";         
            $database='TEX';
            $host='localhost';
        } else {
            $user = 'qwebdevc_tex';
            $pwd = 'lL9FWL424pTH';
            $host='localhost';
            $database='qwebdevc_textalks';
        }
        $dsn="mysql:host=$host;dbname=$database";
        try {
            $conn = new PDO($dsn,$user,$pwd);
            return $conn;
        } catch (PDOException $e) {
            echo '<h1>'.$e.'</h1>';
            echo 'Cannot connect to database';
            exit;
        }
    }

}


?>