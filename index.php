<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');

    include_once $_SERVER['DOCUMENT_ROOT'].'/php/Page.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/php/core.php';

    $Page = new Page;
    $pageInfo = $Page->returnPageInfo();

 ?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <?php include_once $_SERVER['DOCUMENT_ROOT'].'/includes/head.php'; ?>
    <title><?php print $pageInfo['page_title'] ?></title>
</head>
<body class="<?php print $pageInfo['page_name']; ?>">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-64250082-1', 'auto');
  ga('send', 'pageview');

</script>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/includes/header.php'; ?>

<?php 

    if($pageInfo['page_name'] == 'home') {
        include_once $_SERVER['DOCUMENT_ROOT'].'/templates/homePage_videoLinks.php';
    } elseif ($pageInfo['page_name'] == '404') {
        include_once $_SERVER['DOCUMENT_ROOT'].'/templates/404.php';
    } elseif ($pageInfo['page_name'] == 'about') {
        include_once $_SERVER['DOCUMENT_ROOT'].'/templates/about.php';
    } elseif ($pageInfo['page_name'] == 'talks') {
        include_once $_SERVER['DOCUMENT_ROOT'].'/php/addVideoComment.php';
        include_once $_SERVER['DOCUMENT_ROOT'].'/templates/talks.php';
    } else {
        include_once $_SERVER['DOCUMENT_ROOT'].'/templates/homePage_videoLinks.php';
    }

 ?>


<?php include_once $_SERVER['DOCUMENT_ROOT'].'/includes/footer.php'; ?>
<div class="page_info_json"><?php print json_encode($pageInfo, JSON_UNESCAPED_SLASHES); ?></div>
</body>
</html>