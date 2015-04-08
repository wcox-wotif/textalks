<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');


    include_once('db.php');

    $type     = $_POST['type'];
    $feedback = $_POST['feedback'];

    $conn = dbConnect('admin');

    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $done = $conn->prepare("INSERT INTO `feedback` (`type`,`feedback`) VALUES (?,?);");
        $done->bindParam(1, $type);
        $done->bindParam(2, $feedback);
        $done->execute();
        print "done";
    } catch(Exception $e) {
        print "error: ".$e->getMessage();
    }


 ?>