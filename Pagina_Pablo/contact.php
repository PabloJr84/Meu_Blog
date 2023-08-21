<?php
$servername = "localhost:3306";
$username = "inovac68_Pablo";
$password = "P@blo161207";
$dbname = "inovac68_blogpa";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão com o banco de dados falhou: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Realize validações e processamento adicional dos dados, se necessário

    $to = "contato@studioinovacoes.com.br"; // Endereço de e-mail de destino
    $headers = "From: $email";
    $messageToSend = "Nome: $name\nE-mail: $email\nAssunto: $subject\nMensagem: $message";

    if (mail($to, $subject, $messageToSend, $headers)) {
        // Redirecionamento para a página de agradecimento
        header("Location: sucesso.html");
        exit(); // Certifique-se de sair para evitar qualquer saída adicional
    } else {
        echo "Erro ao enviar o e-mail.";
    }
}
?>
