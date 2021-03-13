<?php
require_once("../../config.php");
//if($_POST["confirma_senha"] != $_POST["codigo"]){
    $nome = mysqli_escape_string($conn, htmlspecialchars($_POST["nome"]));
    $senha = md5(mysqli_escape_string($conn, htmlspecialchars($_POST["senha"])));
    if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $email = mysqli_escape_string($conn, htmlspecialchars($_POST["email"]));
    }
    else{
        header("Location: ../../registrar.php?msg=1");
    }
    echo $nome."<br>".$senha."<br>".$email;
    if(mysqli_query($conn, "INSERT INTO usuarios (nome, email, senha, nivel, data_registro) VALUES ('$nome', '$email', '$senha', '2', NOW())")){
        session_start();
        $_SESSION["usuario_login"] = $email;
        $_SESSION["usuario_senha"] = $senha;
        $_SESSION["usuario_id"]    = mysqli_insert_id($conn);
        $_SESSION["usuario_nome"]  = $nome;
        $_SESSION["empresa"]       = 0;
        header("Location: ../cadastro.php");
    }
//}
//else{
    //header("Location: ../../registrar.php?msg=2");
//}

?>