<?php 

    error_reporting(E_ALL);
    ini_set('display_errors', 'On');

    include_once $_SERVER['DOCUMENT_ROOT'].'/php/db.php';

/**
* 
*/
class Core {
    
    public function returnLastResult() {

        $DB = new DB;
        $conn = $DB->connect();
        $data = [];
        $sql = "SELECT * FROM `talks` ORDER BY `id` DESC LIMIT 1";
        foreach ($conn->query($sql) as $row) {
            $data['id'] = $row['id'];
            $data['youtube_id'] = $row['youtube_id'];
            $data['presenter'] = $row['presenter'];
            $data['topic'] = $row['topic'];
            $data['date'] = $row['date'];
            $data['hero_url'] = $row['hero_url'];
            $data['presentation_link'] = $row['presentation_link'];
        }
        return $data;
    }

    public function returnAllTalks() {
        $DB = new DB;
        $conn = $DB->connect();
        $data = [];
        $sql = "SELECT * FROM `talks` ORDER BY `id` DESC";
        foreach ($conn->query($sql) as $row) {
            $data[$row['id']]['id'] = $row['id'];
            $data[$row['id']]['youtube_id'] = $row['youtube_id'];
            $data[$row['id']]['presenter'] = $row['presenter'];
            $data[$row['id']]['topic'] = $row['topic'];
            $data[$row['id']]['date'] = $row['date'];
            $data[$row['id']]['hero_url'] = $row['hero_url'];
            $data[$row['id']]['presentation_link'] = $row['presentation_link'];
        }
        return $data;
    }

    public function returnLast3Results() {
        $DB = new DB;
        $conn = $DB->connect();
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

    public function uploadImage($data){
        try {
            if(is_uploaded_file($data['tmp_name']) && getimagesize($data['tmp_name']) != false) {
                $maxsize = 2000000;
                if($data['size'] < $maxsize ) {
                    $size = getimagesize($data['tmp_name']);
                    $upload_dir = $_SERVER['DOCUMENT_ROOT'] . "/heros/";
                    $timeStamp = time();
                    $maxsize = 2000000;
                    $photo = $data['tmp_name'];
                    $name = str_replace(' ', '_', $data['name']);
                    $name = $timeStamp.$name;
                    $filePath = $upload_dir . $name;
                    $type = $size['mime'];
                    $size = $size[3];
                    $permitted = array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png');
                    foreach ($permitted as $type) {
                        if ($type == $data['type']) {
                            $typeOK = true;
                            break;
                        }
                    }
                    if ($typeOK){
                        if (file_exists($upload_dir) && is_writable($upload_dir)) {
                            $result = move_uploaded_file($photo, $filePath);
                            if (!$result) {
                                echo '<br>'.$upload_dir.' : Upload directory is not writable, or does not exist. <br>';
                            }
                        }
                    } else {
                        return "File type not supported";
                    }
                    return "/heros/" . $name;
                } else {
                    throw new Exception("File Size Error");
                }
            } else {
                throw new Exception("No image selected. You can upload JPG, GIF or PNG files.");
            }
        } catch(Exception $e) {
            // return '<h4>'.$e->getMessage().'</h4>';
        }
    }


    public function getYouTubeData($youtubeIdArray) {
         
        $apiKey = 'AIzaSyC8trposfFdGhSf50FmB9Rs8DADlObyqxY';

        // Get the following
            //  * Title
            //  * Description
            //  * play count
            //  * like count
            //  * comment count

        $youtubeCommaSeparated = implode(",", $youtubeIdArray);

        $url = "https://www.googleapis.com/youtube/v3/videos?part=snippet%2C+contentDetails%2C+statistics&id=" . $youtubeCommaSeparated . "&key={YOUR_API_KEY}";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $return = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($return, true);
        echo $result['html'];


     }

}

























?>