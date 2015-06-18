<?php

    include_once $_SERVER['DOCUMENT_ROOT'].'/php/db.php';

    if(isset($_POST['comment'])){
        
        $comment = $_POST['comment'];
        $talk_id = $_POST['talk_id'];

        try {
            $DB = new DB;
            $conn = $DB->connect();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $done = $conn->prepare("INSERT INTO `comments` (`talk_id`,`comment`) VALUES (?,?);");
            $done->bindParam(1, $talk_id);
            $done->bindParam(2, $comment);
            $done->execute();
        } catch(Exception $e) {
            print 'ERROR: '.$e->getMessage();
        }
        if($done) {
            print "success";
        }
    }










