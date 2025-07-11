<?php
session_start();
ob_start();

// Bloqueio anti-duplicação por tempo (5 segundos)
$agora = time();
if (isset($_SESSION['ultimo_envio']) && ($agora - $_SESSION['ultimo_envio']) < 5) {
    http_response_code(204); // Silenciosamente ignora segunda tentativa
    exit;
}
$_SESSION['ultimo_envio'] = $agora;

require("/home4/vegasm65/gruponex7.com.br/PHPMailer-master/src/PHPMailer.php");
require("/home4/vegasm65/gruponex7.com.br/PHPMailer-master/src/SMTP.php");

use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer();

$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;

$mail->Username = "nex7.contato@gmail.com";
$mail->Password = "gznsgsewhfcmkbql";

$mail->IsHTML(true);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    header('Content-Type: application/json');
    ob_clean();

    $nome     = $_POST['nome'] ?? '';
    $email    = $_POST['email'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $mensagem = $_POST['mensagem'] ?? '';
$corpo = "
    <strong>Mensagem:</strong><br> {$mensagem} <br><br>
    <hr style='border: none; border-top: 1px solid #ccc; margin: 20px 0;'>
    <strong>Nome:</strong> {$nome} <br>
    <strong>Email:</strong> {$email} <br>
    <strong>Telefone:</strong> {$telefone}
";

    $mail->SetFrom("nex7.contato@gmail.com", "Contato do Site");
    $mail->addReplyTo($email, $nome);

   
    $mail->Subject = "$nome";

    $mail->Body = $corpo;
    $mail->AddAddress("nex7.contato@gmail.com");

    if (!$mail->Send()) {
        echo json_encode([
            'success' => false,
            'message' => "Erro ao enviar: " . $mail->ErrorInfo
        ]);
    } else {
        echo json_encode([
            'success' => true,
            'message' => "Mensagem enviada com sucesso!"
        ]);
    }
    exit;
} else {
    ob_clean();
    header('Content-Type: application/json');
    echo json_encode([
        'success' => false,
        'message' => "Requisição inválida."
    ]);
    exit;
}
