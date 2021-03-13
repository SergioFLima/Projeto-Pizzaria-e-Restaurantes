<?php
session_start();
require_once("config.php");
$email = mysqli_escape_string($conn, htmlspecialchars($_POST["email"]));
$senha = md5(mysqli_escape_string($conn, htmlspecialchars($_POST["senha"])));

$rConsulta = mysqli_query($conn, "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'");

if (mysqli_num_rows($rConsulta) == 0) {

	echo '<script>document.location = "login.php?msg=E-mail ou senha invalida!";</script>';

} else {

    $v = mysqli_fetch_assoc($rConsulta);

    $_SESSION["usuario_login"] 		= $v["email"];
    $_SESSION["usuario_senha"] 		= $v["senha"];
    $_SESSION["usuario_id"]    		= $v["id"];
	$_SESSION["usuario_nome"]   	= utf8_encode($v["nome"]);
	$_SESSION["empresa"]			= $v["empresa"];
	$_SESSION["usuario_nivel"]      = $v["nivel"];
    
	if($v["empresa"] == 0){
    	header("Location: admin/cadastro.php");
	}
	else {
		header("Location: admin/index.php");
	}	
}
?>