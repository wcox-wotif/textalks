<?php session_start(); ?>
<?php include_once('php/core.php'); ?>
<html>
<head>

<title>Login</title>

<?php include_once('/includes/adminHead.php'); ?>

</head>
<body>
<?php include_once('includes/header.php'); ?>

<?php 
$hide = 'hide';
$error = '';
if( isset($_GET['error']) ){
$error = $_GET['error'];
$hide = '';
} 
?>

<div id="loginBox">
    <div class="notice <?php echo $hide; ?>">
        <i class="icon-warning-sign icon-large"></i>
        <?php echo $error; ?>
        <a href="#close" class="icon-remove"></a>
    </div>
    <div class="clear10"></div>
    <form method="post" action="core/verifyUser.php" id="login">
        <label for="username">Username</label>
        <input type="text" placeholder="Enter Username" name="username">
        <label for="password">Password</label>
        <input type="password" placeholder="Enter Password" name="password">
        <button class="green center" type="submit" name="login" ><i class="icon-signin"></i> Login</button>
    </form>
    <div class="clear5"></div>
</div>

<?php include_once('includes/adminFooter.php'); ?>
<script type="text/javascript">

$(document).ready(function(){
    ADMIN.login();
});

</script>


</body>
</html>