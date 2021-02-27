<?php

require_once 'vendor/autoload.php';

if (!isset($_POST["email"])) {
  header("location: recuperar_senha.php");
} else {
  if ($_POST["email"] == "") {
    echo "E-mail não informado";
  } else {
    $email = $_POST["email"];

    include("includes/conexao.php");

    $existeEmail = mysqli_query($conexao, "select email from tb_usuarios where email = '$email'");

    if (mysqli_num_rows($existeEmail) == 0) {
      echo "email não cadastrado no nosso sistema!";
    } else {
      // Create the Transport
      $transport = (new Swift_SmtpTransport('smtp.google.com', 465, 'ssl'))
        ->setUsername('teste@gmail.com')
        ->setPassword('123');

      // Create the Mailer using your created Transport
      $mailer = new Swift_Mailer($transport);

      // Create a message
      $message = (new Swift_Message('Solicitação de recuperação de senha'))
        ->setFrom(['teste@gmail.com' => 'devStore'])
        ->setTo([$email => $email])
        ->setBody('Você solicitou uma recuperação de senha, para alterar sua senha clique lo link <a href="localhost/loja/admin/cria_senha.php")>Clique aqui</a>');

      // Send the message
      $result = $mailer->send($message);
      if ($serult) {
        echo "Email de recuperação de senha enviado com sucesso!";
      }
    }
  }
}
