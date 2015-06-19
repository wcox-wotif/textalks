<?php 

    error_reporting(E_ALL);
    ini_set('display_errors', 'On');

    include_once $_SERVER['DOCUMENT_ROOT'].'/php/db.php';

/**
* 
*/
class Core {
    
    public function buildTalkUrl($presenter, $topic) {
            $presenter = str_replace(" ", "_", $presenter);
            $topic =  str_replace(" ", "_", $topic);
            return '/talks/'. $presenter .'-'. $topic;
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

}

























?>