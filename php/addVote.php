<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');


    include_once $_SERVER['DOCUMENT_ROOT'].'/php/db.php';

    $code = $_POST['code'];
    $up = $_POST['up'];
    $down = $_POST['down'];

    $DB = new DB;
    $conn = $DB->connect();

    try {
        $rowCount = "SELECT COUNT(*) FROM `votes` WHERE `code` = '$code'";
        $result = $conn->prepare($rowCount);
        $rowExists = $result->execute();
        $rowExists = $result->fetchColumn();
        if($rowExists){

            $sql = "SELECT * FROM `votes` WHERE `code` = '$code'";
            foreach ($conn->query($sql) as $row) {
                $currentId   = $row['id'];
                $currentUp   = $row['up'];
                $currentDown = $row['down'];
                $currentCode = $row['code'];
            }

            $newUp = intval($currentUp) + intval($up);
            $newDown = intval($currentDown) + intval($down);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $done = $conn->prepare("UPDATE `votes` SET `up` = ?, `down` = ? WHERE `id` = '$currentId'");
            $done->bindParam(1, $newUp);
            $done->bindParam(2, $newDown);
            $done->execute();
        } else {
            try {
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $done = $conn->prepare("INSERT INTO `votes` (`up`,`down`,`code`) VALUES (?,?,?);");
                $done->bindParam(1, $up);
                $done->bindParam(2, $down);
                $done->bindParam(3, $code);
                $done->execute();
            } catch(Exception $e) {
                echo '<h4>'.$e->getMessage().'</h4>';
            }
        }
    } catch(Exception $e) {
        echo '<h4>'.$e->getMessage().'</h4>';
    }


 ?>