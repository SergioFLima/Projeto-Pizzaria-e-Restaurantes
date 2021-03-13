<?php
require("../../include/phpmailer/class/class.phpmailer.php");

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host = "smtp.mailtrap.io";
$mail->SMTPAuth = true;
$mail->Username = '90afef1a64b34f';
$mail->Password = 'fe800998124486';
$mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
$mail->Port = 2525; 
        
$mail->From = "pizza@pizza.com"; 
$mail->FromName = "Teste de E-mail";  
        
$mail->AddAddress($_POST["email"], $_POST["nome"]);
$mail->AddAddress('serginhoflima@gmail.com', 'Pizza');
$mail->IsHTML(true);
$mail->CharSet = 'UTF-8'; // Charset da mensagem (opcional)
$mail->Subject = "Pizza - Código de Confirmação"; // Assunto da mensagem
$mail->Body = "Seu código de confirmação é: ".$_POST["codigo"];
$enviado = $mail->Send();
$mail->ClearAllRecipients();
$mail->ClearAttachments();
?>