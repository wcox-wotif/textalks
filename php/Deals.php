<?php 
/**
* 
*/
include_once $_SERVER['DOCUMENT_ROOT'].'/core/DB/DB.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/core/Class/Page.php';

class Deals {

    public function getDealPageInfo($pageInfo){
        $DB = new DB;
        $conn = $DB->connect();
        if( !empty($pageInfo) ){
            $store_id = $pageInfo['store_id'];
            $sql = "SELECT * FROM `stores` WHERE `id` = '$store_id' LIMIT 1";
            foreach ($conn->query($sql) as $row) {
                $pageInfo['store_info']["id"] = $row['id'];
                $pageInfo['store_info']["company_id"] = $row['company_id'];
                $pageInfo['store_info']["deal_id"] = $row['deal_id'];
                $pageInfo['store_info']["address"] = $row['address'];
                $pageInfo['store_info']["suburb"] = $row['suburb'];
                $pageInfo['store_info']["state"] = $row['state'];
                $pageInfo['store_info']["postcode"] = $row['postcode'];
                $pageInfo['store_info']["lat"] = $row['lat'];
                $pageInfo['store_info']["lng"] = $row['lng'];
                $pageInfo['store_info']["hours_mon"] = $row['hours_mon'];
                $pageInfo['store_info']["hours_tue"] = $row['hours_tue'];
                $pageInfo['store_info']["hours_wed"] = $row['hours_wed'];
                $pageInfo['store_info']["hours_thu"] = $row['hours_thu'];
                $pageInfo['store_info']["hours_fri"] = $row['hours_fri'];
                $pageInfo['store_info']["hours_sat"] = $row['hours_sat'];
                $pageInfo['store_info']["hours_sun"] = $row['hours_sun'];
                $pageInfo['store_info']["phone"] = $row['phone'];
            }
            $company_id = $pageInfo['store_info']["company_id"];
            $sql = "SELECT * FROM `companies` WHERE `id` = '$company_id' LIMIT 1";
            foreach ($conn->query($sql) as $row) {
                $pageInfo['company_info']["id"] = $row['id'];
                $pageInfo['company_info']["company_name"] = $row['company_name'];
                $pageInfo['company_info']["logo_url"] = $row['logo_url'];
            }
            $deal_id = $pageInfo['store_info']["deal_id"];
            $sql = "SELECT * FROM `deals` WHERE `id` = '$deal_id' LIMIT 1";
            foreach ($conn->query($sql) as $row) {
                $pageInfo['deal_price_info']["id"] = $row['id'];
                $pageInfo['deal_price_info']["total_value"] = $row['total_value'];
                $pageInfo['deal_price_info']["price"] = $row['price'];
            }
            $deal_id = $pageInfo['store_info']["deal_id"];
            $sql = "SELECT * FROM `deal_$deal_id` ORDER BY `order`";
            foreach ($conn->query($sql) as $row) {
                $order = $row['order'];
                $pageInfo['deal_info'][$order]["id"] = $row['id'];
                $pageInfo['deal_info'][$order]["title"] = $row['title'];
                $pageInfo['deal_info'][$order]["desc"] = $row['desc'];
                $pageInfo['deal_info'][$order]["extra"] = $row['extra'];
                $pageInfo['deal_info'][$order]["price"] = $row['price'];
                $pageInfo['deal_info'][$order]["quantity"] = $row['quantity'];
                $pageInfo['deal_info'][$order]["order"] = $row['order'];
            }
            return $pageInfo;
        } else {
            return ["error"=>"No page info"];
        }

    }

}
 ?>