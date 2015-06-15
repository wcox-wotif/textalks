<?php
/// Local Host

/**
* 
*/
class DB {
        
    public function connect() {

        $server = $_SERVER['SERVER_NAME'];
        $env = strstr($server, '.', true);
        if($env == 'dev') {
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

<?php
/// Local Host
function dbConnect($type) {
    if ($type == 'admin') {
        $user = 'TEX';
        $pwd = 'R8rLdyDB9566J7hX';
    } else {
        exit('Unregognisable connection type');
    }
    // Connection code goes here
    $host='localhost';
    $database='TEX';
    $dsn="mysql:host=$host;dbname=$database";
    try {
        $conn = new PDO($dsn,$user,$pwd);
        return $conn;
    } 
    catch (PDOException $e) {
        echo 'Cannot connect to database';
        exit;
    }
}



 // Live Website
// function dbConnect($type) {
//  if ($type == 'admin') {
//      $user = 'qwebdevc_tex';
//      $pwd = 'lL9FWL424pTH';
//  } else {
//      exit('Unregognisable connection type');
//  }
//  // Connection code goes here
//  $host='localhost';
//  $database='qwebdevc_textalks';
//  $dsn="mysql:host=$host;dbname=$database";
//  try {
//      $conn = new PDO($dsn,$user,$pwd);
//      return $conn;
//  } 
//  catch (PDOException $e) {
//      echo 'Cannot connect to database';
//      exit;
//  }
// }

/// Local Host

/**
* 
*/
class DB {
        
    public function connect() {

        $server = $_SERVER['SERVER_NAME'];
        $env = strstr($server, '.', true);
        if($env == 'dev') {
            $user = "qwebdevc_bcs";
            $pwd = "hpvPMNRPszA6pUCP";         
            $database='bcs';
            $host='localhost';
        } else {
            $user = 'qwebdevc_bcs';
            $pwd = 'hftwg*RLe]i3?OQ$SX';
            $host='localhost';
            $database='qwebdevc_bcs';
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


?>


?>