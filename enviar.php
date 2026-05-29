<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome      = htmlspecialchars($_POST['nome']);
    $email     = htmlspecialchars($_POST['email']);
    $assunto   = htmlspecialchars($_POST['assunto']);
    $mensagem  = htmlspecialchars($_POST['mensagem']);

    /* =========================
       CONFIGURAÇÕES
    ========================== */

    $email_destino = 'paulinhoxsilva95@gmail.com';
    $numero_whatsapp = '5521990084804';

    /* =========================
       ENVIO DE E-MAIL
    ========================== */

    $titulo = 'Novo contato do portfólio';

    $conteudo = "Nome: $nome
";
    $conteudo .= "E-mail: $email
";
    $conteudo .= "Assunto: $assunto

";
    $conteudo .= "Mensagem:
$mensagem";

    $headers = "From: $email";

    mail($email_destino, $titulo, $conteudo, $headers);

    /* =========================
       REDIRECIONA PARA WHATSAPP
    ========================== */

    $texto = "*Novo contato do portfólio*%0A%0A";
    $texto .= "*Nome:* {$nome}%0A";
    $texto .= "*E-mail:* {$email}%0A";
    $texto .= "*Assunto:* {$assunto}%0A%0A";
    $texto .= "*Mensagem:*%0A{$mensagem}";

    header("Location: https://wa.me/{$numero_whatsapp}?text={$texto}");
    exit;
}

?>