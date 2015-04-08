<?php 

    error_reporting(E_ALL);
    ini_set('display_errors', 'On');

    include_once('db.php');

/**
* 
*/
class Core {
    
    public function returnLastResult() {

        $conn = dbConnect('admin');
        $data = [];
        $sql = "SELECT * FROM `talks` ORDER BY `id` DESC LIMIT 1";
        foreach ($conn->query($sql) as $row) {
            $data['id'] = $row['id'];
            $data['youtube_id'] = $row['youtube_id'];
            $data['presenter'] = $row['presenter'];
            $data['topic'] = $row['topic'];
            $data['date'] = $row['date'];
            $data['presentation_link'] = $row['presentation_link'];
        }
        return $data;
    }

    public function returnAllResults() {
        $conn = dbConnect('admin');
        $data = [];
        $sql = "SELECT * FROM `talks` ORDER BY `id` DESC";
        foreach ($conn->query($sql) as $row) {
            $data[$row['id']]['id'] = $row['id'];
            $data[$row['id']]['youtube_id'] = $row['youtube_id'];
            $data[$row['id']]['presenter'] = $row['presenter'];
            $data[$row['id']]['topic'] = $row['topic'];
            $data[$row['id']]['date'] = $row['date'];
            $data[$row['id']]['presentation_link'] = $row['presentation_link'];
        }
        return $data;
    }

    public function returnLast3Results() {
        $conn = dbConnect('admin');
        $data = [];
        $sql = "SELECT * FROM `talks` ORDER BY `id` DESC LIMIT 3";
        foreach ($conn->query($sql) as $row) {
            $data[$row['id']]['id'] = $row['id'];
            $data[$row['id']]['youtube_id'] = $row['youtube_id'];
            $data[$row['id']]['presenter'] = $row['presenter'];
            $data[$row['id']]['topic'] = $row['topic'];
            $data[$row['id']]['date'] = $row['date'];
            $data[$row['id']]['presentation_link'] = $row['presentation_link'];
        }
        return $data;
    }
}
?>