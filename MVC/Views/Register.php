<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$message = '';
if(isset($_SESSION['success'])){
    $message = $_SESSION['success'];
}elseif ($_SESSION['danger']){
    $message = $_SESSION['danger'];
}
unset($_SESSION['success'])

?>
<html>
<head><title>Register</title></head>
<body>
<?php include_once 'partials/_nav.php'?>
<h2><?=$message?></h2>
<form method="POST" action="<?=BASE?>/customers/register">
    <input type="text" name="name">
    <br>
    <input type="text" name="email">
    <br>
    <input type="text" name="address">
    <br>
    <input type="text" name="password">
    <br>
    <input type="submit" value="Register">
</form>
</body>
<?php include_once 'partials/_footer.php'?>
</html>