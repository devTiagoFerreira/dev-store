<?php 
 $email = $_POST["email"];
 
include("includes/conexao.php");
$existeEmail = mysqli_query($conexao,"select email from tb_usuarios where email = '$email'");
if (mysqli_num_rows($existeEmail)==0){
	echo '<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-6 text-white"> <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>Email não cadastrado no nosso sistema!</div>';
	exit();
}
 
require_once 'vendor/autoload.php';
// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.googlemail.com', 465, 'ssl'))
      ->setUsername('teste@gmail.com')
      ->setPassword('123')
    ;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Solicitação de Recuperação de Senha'))
  ->setFrom(['teste@gmail.com' => 'DevStore'])
  ->setTo([$email => $email])
  ->setBody('Você solicitou uma recuperação de senha, para alterar sua senha <a href="localhost/loja/admin/alteraSenha.php.php?email='.$email.'">Clique aqui</a>')
  ;

// Send the message
$result = $mailer->send($message);
if ($result){
	echo '<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-9 text-white"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle w-6 h-6 mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg> Email de recuperação de senha enviado! <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x w-4 h-4 ml-auto"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg> </div>';
}
?>