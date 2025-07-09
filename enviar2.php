<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Verifique o caminho correto para seu autoload

if (!empty($_POST['email'])) {
    $nome     = htmlspecialchars($_POST['nome']);
    $email    = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $telefone = htmlspecialchars($_POST['telefone']);
    $mensagem = htmlspecialchars($_POST['mensagem']);

    if (!$email) {
        die("Email inválido.");
    }

    $mail = new PHPMailer(true);

    try {
        // Configuração do servidor SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'kelwin.esechiel28@gmail.com'; // Substitua pelo seu
        $mail->Password   = 'ezjxblpcbanwocul';            // Substitua pela senha correta
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Remetente e destinatário
        $mail->setFrom('kelwin.esechiel28@gmail.com', 'Formulário do Site');
        $mail->addAddress('kelwin.esechiel8@gmail.com', 'Kelwin');
        $mail->addReplyTo($email, $nome);

        // Conteúdo do email
        $mail->isHTML(true);
        $mail->Subject = 'Mensagem do site - Contato rápido';
        $mail->Body    = "
            <h2>Nova mensagem recebida:</h2>
            <b>Nome:</b> {$nome}<br>
            <b>Email:</b> {$email}<br>
            <b>Telefone:</b> {$telefone}<br><br>
            <b>Mensagem:</b><br> {$mensagem}
        ";
        $mail->AltBody = "Nome: {$nome}\nEmail: {$email}\nTelefone: {$telefone}\n\nMensagem:\n{$mensagem}";

        $mail->send();
        echo "<h3>Mensagem enviada com sucesso!</h3>";
        echo '<a href="index.html">Voltar</a>';
    } catch (Exception $e) {
        echo "Erro ao enviar: {$mail->ErrorInfo}";
    }
} else {
    echo "Formulário não enviado. Preencha todos os campos.";
}
