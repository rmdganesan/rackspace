<?php
require __DIR__ . '/vendor/autoload.php';
use App\Lib\MySQLDB;
use App\Lib\User;
use App\Lib\Shorty;
$objDB = new MySQLDB('mysql', 'root','root','rackspace');
$objUser = new User($objDB);
$objShorty = new Shorty($objDB);
//$objUser->fetchUsers();
#action=login
if($_GET['action'] == 'login'){
    $data = $objUser->logincheck($_POST['email'], $_POST['password']);
    echo json_encode($data);
}elseif($_GET['action'] == 'create-url') {
    $data = $objShorty->newShorty($_POST['url']);
    echo json_encode($data);
}elseif($_GET['action'] == 'logout') {
    session_start();
    session_destroy(); 
    unset($_SESSION);
    header("Location:index.php");
}elseif(isset($_GET['data'])){
   if($objShorty->checkExsting('http://rs.io/'.$_GET['data'], 'surl'))
        header("Location: $objShorty->furl");
    else
        header("Location: http://rackspace.example.com/no.html");
}

