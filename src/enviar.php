<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if (!empty($_POST['email'])) {
    $nome = htmlspecialchars($_POST['nome']);
    $sobrenome = htmlspecialchars($_POST['sobrenome']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    if (!$email) {
        die("Email inválido");
    }
    $empresa = htmlspecialchars($_POST['empresa']);
    $segmento = htmlspecialchars($_POST['segmento']);
    $cidade = htmlspecialchars($_POST['cidade']);
    $estado = htmlspecialchars($_POST['estado']);
    $referencia = htmlspecialchars($_POST['referencia']);
    $mensagem = htmlspecialchars($_POST['mensagem']);

    $mail = new PHPMailer(true);

    try {
        // Configurações do servidor da HostGator
        $mail->isSMTP();
        $mail->Host       = 'vegasmaringa@gruponex7.com.br'; // substitua pelo seu domínio real
        $mail->SMTPAuth   = true;
        $mail->Username   = 'vegasmaringa@gruponex7.com.br'; // e-mail criado no cPanel
        $mail->Password   = '"7w/rU"JahXli5G';            // senha definida no cPanel
        $mail->SMTPSecure = 'ssl';                      // ou 'tls' se SSL não funcionar
        $mail->Port       = 465;                         // ou 587 para TLS

        // Configuração dos remetentes
        $mail->setFrom('vegasmaringa@gruponex7.com.br', 'Site Contato');
        $mail->addAddress('vegasmaringa@gruponex7.com.br', 'Empresa');
        $mail->addReplyTo($email, $nome . ' ' . $sobrenome);

        // Conteúdo do e-mail
        $mail->isHTML(true);
        $mail->Subject = 'Nova mensagem do formulário de contato';
        $mail->Body    = "
            <h2>Nova mensagem recebida:</h2>
            <b>Nome:</b> {$nome} {$sobrenome}<br>
            <b>Email:</b> {$email}<br>
            <b>Empresa:</b> {$empresa}<br>
            <b>Segmento:</b> {$segmento}<br>
            <b>Cidade:</b> {$cidade}<br>
            <b>Estado:</b> {$estado}<br>
            <b>Como ouviu falar:</b> {$referencia}<br><br>
            <b>Mensagem:</b><br> {$mensagem}
        ";
        $mail->AltBody = "Nome: {$nome} {$sobrenome}\n".
                         "Email: {$email}\n".
                         "Empresa: {$empresa}\n".
                         "Segmento: {$segmento}\n".
                         "Cidade: {$cidade}\n".
                         "Estado: {$estado}\n".
                         "Como ouviu falar: {$referencia}\n\n".
                         "Mensagem:\n{$mensagem}";

        $mail->send();
        echo "<h3>Mensagem enviada com sucesso!</h3>";
        echo '<a href="index.html">Voltar</a>';
    } catch (Exception $e) {
        echo "Erro ao enviar: {$mail->ErrorInfo}";
    }
} else {
    echo "Formulário não enviado. Verifique os campos.";
}
