<?php 

    error_reporting(E_ALL);
    ini_set('display_errors', 'On');


/**
* 
*/
include_once $_SERVER['DOCUMENT_ROOT'].'/php/db.php';

class Page {
    
    public function returnPageInfo(){
        $pageInfo = [];
        $page_name = $_SERVER['REQUEST_URI'];
        $page_name = explode('/', $page_name);
        if($page_name[1] == ''){
            $pageInfo['page_name'] = 'home';
            $pageInfo['page_title'] = 'tex: Plan, Present, Improve';
        } elseif ($page_name[1] == 'talks') {
            $pageInfo['page_name'] = 'talks';
            $talksInfo = explode('-', $page_name[2]);
            $pageInfo['presenter'] = str_replace("_", " ", $talksInfo[0]);
            $pageInfo['topic'] = str_replace("_", " ", $talksInfo[1]);
            $talkInfo = $this->returnTalkInfo($pageInfo['presenter'], $pageInfo['topic']);
            $pageInfo['page_title'] = $pageInfo['presenter'] .' Presenting: '. $pageInfo['topic'];
            $pageInfo['meta_description'] = $pageInfo['presenter'] .' Presenting: '. $pageInfo['topic'];
            $pageInfo = array_merge($pageInfo,$talkInfo);
        }
        return $pageInfo;
    }

    public function returnTalkInfo($presenter, $topic) {
        $pageInfo = [];
        $DB = new DB;
        $conn = $DB->connect();
        $sql = "SELECT * FROM `talks` WHERE `presenter` = '$presenter' AND `topic` = '$topic' LIMIT 1";
        foreach ($conn->query($sql) as $row) {
            $pageInfo['talk']["id"] = $row['id'];
            $pageInfo['talk']["youtube_id"] = $row['youtube_id'];
            $pageInfo['talk']["presenter"] = $row['presenter'];
            $pageInfo['talk']["topic"] = $row['topic'];
            $pageInfo['talk']["date"] = $row['date'];
            $pageInfo['talk']["hero_url"] = $row['hero_url'];
        }
        return $pageInfo;
    }

}












