<?php 

    error_reporting(E_ALL);
    ini_set('display_errors', 'On');


/**
* 
*/
include_once $_SERVER['DOCUMENT_ROOT'].'/php/db.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/php/core.php';

class Page {
    
    public function returnPageInfo(){
        $Core = new Core;
        $pageInfo = [];
        $page_name = $_SERVER['REQUEST_URI'];
        $page_name = explode('/', $page_name);
        
        if($page_name[1] == ''){
        
            $pageInfo['page_name'] = 'home';
            $pageInfo['page_title'] = 'tex: Plan, Present, Improve';
            $pageInfo['meta_description'] = "TEX Talks are a win-win for the speaker and the audience. As a presenter, you gain confidence from practicing in front of real people who provide you with constructive feedback (bet your cat Mittens doesn’t do that). By sitting in on the weekly talks, your colleagues benefit from your knowledge and experience, especially when you choose a topic you’re passionate about.";
            $pageInfo['talks'] = $this->returnAllTalksInfo();
        
        } elseif ($page_name[1] == 'talks') {
        
            $talksInfo = explode('-', $page_name[2]);
            $pageInfo['presenter'] = str_replace("_", " ", $talksInfo[0]);
            $pageInfo['topic'] = str_replace("_", " ", $talksInfo[1]);
            $talkInfo = $this->returnTalkInfo($pageInfo['presenter'], $pageInfo['topic']);
            $commentInfo = $this->returnCommentInfo($talkInfo['talk']['id']);
            $likeInfo = $this->returnLikeInfo($talkInfo['talk']['id']);
            $nextPrevTalks = $this->returnNextAndPrevTalks($talkInfo['talk']['id']);

            $pageInfo['page_name'] = 'talks';
            $pageInfo['page_title'] = $pageInfo['presenter'] .' Presenting: '. $pageInfo['topic'];
            $pageInfo['meta_description'] = $pageInfo['presenter'] .' Presenting: '. $pageInfo['topic'];
            $youtubeInfo = $this->getYouTubeData($talkInfo['talk']['youtube_id']);
            $pageInfo = array_merge($pageInfo,$talkInfo,$commentInfo,$likeInfo,$nextPrevTalks,$youtubeInfo);
        
        }
        return $pageInfo;
    }

    private function returnTalkInfo($presenter, $topic) {
        $pageInfo = [];
        $Core = new Core;
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
            $pageInfo['talk']["views"] = $row['views'];
            $pageInfo['talk']["url"] = $Core->buildTalkUrl($row['presenter'], $row['topic']);
        }
        return $pageInfo;
    }

    private function returnCommentInfo($talk_id) {
        $DB = new DB;
        $conn = $DB->connect();
        $pageInfo = [];
        $rowCount = "SELECT COUNT(*) FROM `comments` WHERE `talk_id` = '$talk_id'";
        $result = $conn->prepare($rowCount);
        $rowExists = $result->execute();
        $rowExists = $result->fetchColumn();
        if($rowExists){
            $sql = "SELECT * FROM `comments` WHERE `talk_id` = '$talk_id'";
            foreach ($conn->query($sql) as $row) {
                $id = $row['id'];
                $pageInfo['comments'][$id]["talk_id"] = $row['talk_id'];
                $pageInfo['comments'][$id]["comment"] = $row['comment'];
            }
        } else {
                $pageInfo['comments'][$talk_id]["talk_id"] = '';
                $pageInfo['comments'][$talk_id]["comment"] = '';
        }

        return $pageInfo;
    }

    private function returnLikeInfo($talk_id) {
        $DB = new DB;
        $conn = $DB->connect();
        $pageInfo = [];
        $rowCount = "SELECT COUNT(*) FROM `likes` WHERE `talk_id` = '$talk_id'";
        $result = $conn->prepare($rowCount);
        $rowExists = $result->execute();
        $rowExists = $result->fetchColumn();
        if($rowExists){
            $sql = "SELECT * FROM `likes` WHERE `talk_id` = '$talk_id' LIMIT 1";
            foreach ($conn->query($sql) as $row) {
                $pageInfo['likes']["id"] = $row['id'];
                $pageInfo['likes']["talk_id"] = $row['talk_id'];
                $pageInfo['likes']["like_count"] = $row['like_count'];
            }
        } else {
                $pageInfo['likes']["id"] = '';
                $pageInfo['likes']["talk_id"] = $talk_id;
                $pageInfo['likes']["like_count"] = '0';
        }
        return $pageInfo;
    }

    private function returnNextAndPrevTalks($talkId) {
        $Core = new Core;
        $DB = new DB;
        $conn = $DB->connect();
        $sql = "SELECT * FROM `talks` WHERE `id` > '$talkId' ORDER BY `id` LIMIT 1";
        foreach ($conn->query($sql) as $row) {
            $pageInfo['next_prev_talks']['next']['id'] = $row['id'];
            $pageInfo['next_prev_talks']['next']['youtube_id'] = $row['youtube_id'];
            $pageInfo['next_prev_talks']['next']['presenter'] = $row['presenter'];
            $pageInfo['next_prev_talks']['next']['topic'] = $row['topic'];
            $pageInfo['next_prev_talks']['next']['date'] = $row['date'];
            $pageInfo['next_prev_talks']['next']['hero_url'] = $row['hero_url'];
            $pageInfo['next_prev_talks']['next']['presentation_link'] = $row['presentation_link'];
            $pageInfo['next_prev_talks']['next']['views'] = $row['views'];
            $pageInfo['next_prev_talks']['previous']['url'] = $Core->buildTalkUrl($row['presenter'], $row['topic']);
        }
        $sql = "SELECT * FROM `talks` WHERE `id` < '$talkId' ORDER BY `id` LIMIT 1";
        foreach ($conn->query($sql) as $row) {
            $pageInfo['next_prev_talks']['previous']['id'] = $row['id'];
            $pageInfo['next_prev_talks']['previous']['youtube_id'] = $row['youtube_id'];
            $pageInfo['next_prev_talks']['previous']['presenter'] = $row['presenter'];
            $pageInfo['next_prev_talks']['previous']['topic'] = $row['topic'];
            $pageInfo['next_prev_talks']['previous']['date'] = $row['date'];
            $pageInfo['next_prev_talks']['previous']['hero_url'] = $row['hero_url'];
            $pageInfo['next_prev_talks']['previous']['presentation_link'] = $row['presentation_link'];
            $pageInfo['next_prev_talks']['previous']['views'] = $row['views'];
            $pageInfo['next_prev_talks']['previous']['url'] = $Core->buildTalkUrl($row['presenter'], $row['topic']);
        }
        return $pageInfo;
    }

    private function returnAllTalksInfo() {
        $Core = new Core;
        $DB = new DB;
        $conn = $DB->connect();
        $pageInfo = [];
        $sql = "SELECT * FROM `talks` ORDER BY `id` DESC";
        foreach ($conn->query($sql) as $row) {
            $pageInfo[$row['id']]['id'] = $row['id'];
            $pageInfo[$row['id']]['youtube_id'] = $row['youtube_id'];
            $pageInfo[$row['id']]['presenter'] = $row['presenter'];
            $pageInfo[$row['id']]['topic'] = $row['topic'];
            $pageInfo[$row['id']]['date'] = $row['date'];
            $pageInfo[$row['id']]['hero_url'] = $row['hero_url'];
            $pageInfo[$row['id']]['presentation_link'] = $row['presentation_link'];
            $pageInfo[$row['id']]['views'] = $row['views'];
            $pageInfo[$row['id']]['views'] = $row['views'];
            $pageInfo[$row['id']]['url'] = $Core->buildTalkUrl($row['presenter'], $row['topic']);
        }
        return $pageInfo;
    }

    private function getYouTubeData($youtubeIdArray) {
         
        $apiKey = 'AIzaSyC8trposfFdGhSf50FmB9Rs8DADlObyqxY';
        $url = "https://www.googleapis.com/youtube/v3/videos?part=snippet%2C+contentDetails%2C+statistics&id=" . $youtubeIdArray . "&key=".$apiKey;
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $return = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($return, true);
        $pageInfo['youtube_info']['views'] = $result['items'][0]['statistics']['viewCount'];
        
        return $pageInfo;
    }

}












