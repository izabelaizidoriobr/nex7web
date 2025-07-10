<?php
$mail = new PHPMailer\PHPMailer\PHPMailer();   
$mail->IsSMTP(); // enable SMTP   
$mail->SMTPDebug = 1; // debugging: 1 = errorsandmessages, 2 = messagesonly  
$mail->SMTPAuth = true; // authenticationenabled   
$mail->SMTPSecure = 'ssl'; //   
$mail->Host = "smtp.titan.email";   
$mail->Port = 465;   
$mail->IsHTML(true);   
$mail->Username = "vegasmaringa@gruponex7.com.br";   
$mail->Password = "mar7#Vegas88";   
$mail->SetFrom("vegasmaringa@gruponex7.com.br");   
$mail->Subject = "Assunto da mensagem";   
$mail->Body = "Escreva o texto do email aqui";   
$mail->AddAddress("vegasmaringa@gruponex7.com.br");  
if(!$mail->Send()) {  
     echo "Mailer Error: " . $mail->ErrorInfo;    
  }else {  
    echo "Mensagem enviada com sucesso"; }

    ?>