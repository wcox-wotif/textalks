<?php

    include_once $_SERVER['DOCUMENT_ROOT'].'/php/db.php';

    if(isset($_POST['talk_id'])){
        
        $talk_id = $_POST['talk_id'];

        try {
            $DB = new DB;
            $conn = $DB->connect();
            $rowCount = "SELECT COUNT(*) FROM `likes` WHERE `talk_id` = '$talk_id'";
            $result = $conn->prepare($rowCount);
            $rowExists = $result->execute();
            $rowExists = $result->fetchColumn();
            if($rowExists){

                $sql = "SELECT * FROM `likes` WHERE `talk_id` = '$talk_id' LIMIT 1";
                foreach ($conn->query($sql) as $row) {
                    $rowId = $row['id'];
                    $currentCount = $row['like_count'];
                }

                $newCount = intval($currentCount) + 1;

                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $done = $conn->prepare("UPDATE `likes` SET `like_count` = ? WHERE `id` = '$rowId'");
                $done->bindParam(1, $newCount);
                $done->execute();
            } else {
                try {
                    $like_count = 1;
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $done = $conn->prepare("INSERT INTO `likes` (`talk_id`,`like_count`) VALUES (?,?);");
                    $done->bindParam(1, $talk_id);
                    $done->bindParam(2, $like_count);
                    $done->execute();
                } catch(Exception $e) {
                    print 'ERROR: '.$e->getMessage();
                }
            }
        } catch(Exception $e) {
            print 'ERROR: '.$e->getMessage();
        }
        if($done) {
            print 'success';
        } else {
            print "fail";
        }
    }










