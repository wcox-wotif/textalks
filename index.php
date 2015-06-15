<?php 

    error_reporting(E_ALL);
    ini_set('display_errors', 'On');

    include_once $_SERVER['DOCUMENT_ROOT'].'/php/Page.php';

    $Page = new Page;
    $pageInfo = $Page->returnPageInfo();

 ?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <?php include_once $_SERVER['DOCUMENT_ROOT'].'/includes/head.php'; ?>
    <title>TEX Talks - Expedia learning</title>
</head>
<body>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/includes/header.php'; ?>

<?php 

    if($pageInfo['page_name'] == 'home') {
        include_once $_SERVER['DOCUMENT_ROOT'].'/templates/homePage_videoLinks.php';
    } elseif ($pageInfo['page_name'] == 'talks') {
        include_once $_SERVER['DOCUMENT_ROOT'].'/templates/talks.php';        
    }

 ?>


<?php include_once $_SERVER['DOCUMENT_ROOT'].'/includes/footer.php'; ?>
<div class="page_info_json"><?php print json_encode($pageInfo, JSON_UNESCAPED_SLASHES); ?></div>
</body>
</html>