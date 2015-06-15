<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');


    include_once $_SERVER['DOCUMENT_ROOT'].'/php/db.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/php/core.php';

    $hero_img = $_FILES['hero_img'];
    $youtube_id = $_POST['youtube_id'];
    $presenter = $_POST['presenter'];
    $topic = $_POST['topic'];
    $date = $_POST['date'];
    $presentation_link = $_POST['presentation_link'];

    $DB = new DB;
    $conn = $DB->connect();

    try {
        $Core = new Core;
        $heroImgName = $Core->uploadImage($hero_img);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $done = $conn->prepare("INSERT INTO `talks` (`hero_url`,`youtube_id`,`presenter`,`topic`,`date`,`presentation_link`) VALUES (?,?,?,?,?,?);");
        $done->bindParam(1, $heroImgName);
        $done->bindParam(2, $youtube_id);
        $done->bindParam(3, $presenter);
        $done->bindParam(4, $topic);
        $done->bindParam(5, $date);
        $done->bindParam(6, $presentation_link);
        $done->execute();
    } catch(Exception $e) {
        // echo '<h4>'.$e->getMessage().'</h4>';
    }

    if($done){
        echo '<META HTTP-EQUIV="Refresh" Content="7; URL=/admin.php">';
    }

 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Uploading new talk</title>
<style>
body {
    background: #48fdbc;
}
.spinner {
    margin: 310px auto;
    width: 560px;
    height: 300px;
    text-align: center;
    font-size: 20px;
}

.spinner > div {
  background-color: #FFF;
  height: 100%;
  width: 6px;
  display: inline-block;
  
  -webkit-animation: stretchdelay 1.9s infinite ease-in-out;
  animation: stretchdelay 1.9s infinite ease-in-out;
}

.spinner .rect2 {
  -webkit-animation-delay: -1.8s;
  animation-delay: -1.8s;
}

.spinner .rect3 {
  -webkit-animation-delay: -1.7s;
  animation-delay: -1.7s;
}

.spinner .rect4 {
  -webkit-animation-delay: -1.6s;
  animation-delay: -1.6s;
}

.spinner .rect5 {
  -webkit-animation-delay: -1.5s;
  animation-delay: -1.5s;
}
.spinner .rect6 {
  -webkit-animation-delay: -1.4s;
  animation-delay: -1.4s;
}
.spinner .rect7 {
  -webkit-animation-delay: -1.3s;
  animation-delay: -1.3s;
}
.spinner .rect8 {
  -webkit-animation-delay: -1.2s;
  animation-delay: -1.2s;
}
.spinner .rect9 {
  -webkit-animation-delay: -1.1s;
  animation-delay: -1.1s;
}
.spinner .rect10 {
  -webkit-animation-delay: -1.2s;
  animation-delay: -1.2s;
}
.spinner .rect11 {
  -webkit-animation-delay: -1.3s;
  animation-delay: -1.3s;
}
.spinner .rect12 {
  -webkit-animation-delay: -1.4s;
  animation-delay: -1.4s;
}
.spinner .rect13 {
  -webkit-animation-delay: -1.5s;
  animation-delay: -1.5s;
}
.spinner .rect14 {
  -webkit-animation-delay: -1.6s;
  animation-delay: -1.6s;
}
.spinner .rect15 {
  -webkit-animation-delay: -1.7s;
  animation-delay: -1.7s;
}
.spinner .rect16 {
  -webkit-animation-delay: -1.8s;
  animation-delay: -1.8s;
}
.spinner .rect17 {
  -webkit-animation-delay: -1.9s;
  animation-delay: -1.9s;
}

@-webkit-keyframes stretchdelay {
  0%, 40%, 100% { -webkit-transform: scaleY(0.4) }  
  20% { -webkit-transform: scaleY(1.0) }
}

@keyframes stretchdelay {
  0%, 40%, 100% { 
    transform: scaleY(0.4);
    -webkit-transform: scaleY(0.4);
  }  20% { 
    transform: scaleY(1.0);
    -webkit-transform: scaleY(1.0);
  }
}
@keyframes lastIcon {
    0% {
        opacity: 0;
        transform: scale(0.8);
    }
    50% {
        transform: scale(1.1);
    }
    90% {
        transform: scale(0.97);
    }
    100% {
        transform: scale(1);
        opacity: 1;
    }
}
h1, h2 {
    text-align: center;
    color: #FFF;
}
h1 {
    color: red;
    animation: lastIcon 0.75s 4s ease forwards;
    opacity: 0;
}
h2 {
}

</style>    
</head>
<body>
<?php 
    $num1 = rand(2,20);
    $num2 = rand(2,20);
    $answer = $num1 * $num2;
 ?>
    <h2>Q: What is: <?php print $num1; ?> X <?php print $num2; ?>?</h2>
    <h1>A: <?php echo $answer; ?></h1>
<div class="spinner">
  <div class="rect1"></div>
  <div class="rect2"></div>
  <div class="rect3"></div>
  <div class="rect4"></div>
  <div class="rect5"></div>
  <div class="rect6"></div>
  <div class="rect7"></div>
  <div class="rect8"></div>
  <div class="rect9"></div>
  <div class="rect10"></div>
  <div class="rect11"></div>
  <div class="rect12"></div>
  <div class="rect13"></div>
  <div class="rect14"></div>
  <div class="rect15"></div>
  <div class="rect16"></div>
  <div class="rect17"></div>
</div>

</body>
</html>