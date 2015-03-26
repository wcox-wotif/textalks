<?php 

    error_reporting(E_ALL);
    ini_set('display_errors', 'On');

    include_once('db.php');

    $conn = dbConnect('admin');
    $data = array();
    $sql = "SELECT * FROM `votes`";
    foreach ($conn->query($sql) as $row) {
        $data[$row['code']]["up"] = $row['up'];
        $data[$row['code']]["down"] = $row['down'];
        $data[$row['code']]["code"] = $row['code'];
        $data[$row['code']]["id"] = $row['id'];
        // array_push($data, $data[$row['code']]);
    }
    echo json_encode($data);




 ?>