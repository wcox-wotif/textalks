<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');


    include_once('db.php');

    $youtube_id = $_POST['youtube_id'];
    $presenter = $_POST['presenter'];
    $topic = $_POST['topic'];
    $date = $_POST['date'];
    $presentation_link = $_POST['presentation_link'];

    $conn = dbConnect('admin');

    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $done = $conn->prepare("INSERT INTO `talks` (`youtube_id`,`presenter`,`topic`,`date`,`presentation_link`) VALUES (?,?,?,?,?);");
        $done->bindParam(1, $youtube_id);
        $done->bindParam(2, $presenter);
        $done->bindParam(3, $topic);
        $done->bindParam(4, $date);
        $done->bindParam(5, $presentation_link);
        $done->execute();
        echo "success";
    } catch(Exception $e) {
        echo '<h4>'.$e->getMessage().'</h4>';
    }


 ?>