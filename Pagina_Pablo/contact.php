<?php
$submitted = false;
$message = "Obrigado";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $messageText = $_POST["message"];

    // Realize validações e processamento adicional dos dados, se necessário

    $to = "contato@studioinovacoes.com.br"; // Endereço de e-mail de destino
    $headers = "From: $email";
    $messageToSend = "Nome: $name\nE-mail: $email\nAssunto: $subject\nMensagem: $messageText";

    if (mail($to, $subject, $messageToSend, $headers)) {
        header("Location: "); // Redireciona para a página de sucesso
        exit; // Termina o script após o redirecionamento
    } else {
        $message = "Erro ao enviar o e-mail.";
    }
}
?>