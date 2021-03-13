<?php
include('config.php');
$sub = explode('.', $_SERVER['HTTP_HOST'])[0];

if($sub == "admin"){
    header('Location: login.php');
}
echo 'Teste';
?>