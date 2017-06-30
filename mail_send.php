<?php

function pegaValor($valor) {
    return isset($_POST[$valor]) ? $_POST[$valor] : '';
}

function validaEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function enviaEmail($de, $assunto, $mensagem, $para, $email_servidor) {
    $headers = "From: $email_servidor\r\n" .
        "Reply-To: $de\r\n" .
        "X-Mailer: PHP/" . phpversion() . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    mail($para, $assunto, nl2br($mensagem), $headers);
}

$email_servidor = "ederson@vsinfo.inf.br"; //Email do Servidor
$para = "edergp2009@gmail.com"; //Seu Email

//Pega os valores
$de = pegaValor("email");
$nome = pegaValor("nome");
$telefone = pegaValor("telefone");
$mensagem = pegaValor("mensagem");

$assunto = "Site da Visual Software"; //Assunto da mensagem
$corpo = '<center><h1>Mensagem do Visitante</h1></center>' . "\n\n" . '<strong>Nome: </strong>' . $nome . "\n\n" . '<strong>Telefone: </strong>' . $telefone . "\n\n" . '<strong>Email: </strong>' . $de . "\n\n" . '<strong>Mensagem: </strong>' . $mensagem;


if (validaEmail($de) && $mensagem) {
    enviaEmail($de, $assunto, $corpo, $para, $email_servidor);
    $pagina = "mail_ok.php";
} else {
    $pagina = "mail_error.php";
}

header("location:$pagina");

?>