<?php 

    error_reporting(E_ALL);
    ini_set('display_errors', 'On');

    include_once('db.php');

    if(isset($_POST['type'])){
        $type = $_POST['type'];
        $conn = dbConnect('admin');
        $data = array();
        $sql = "SELECT * FROM `feedback` WHERE `type` = '$type'";
        foreach ($conn->query($sql) as $data) {
            include('../templates/feedbackPosts.php');
        }
    }

?>