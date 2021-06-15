<?php
session_start();
//As informações do e-mail para onde será enviado o formulário preenchido
$email_destinatario = 'seuamail@seuservidor.com.br';
$nome_destinatario  = 'Nome de quem vai receber o Email';
$servidor           = 'mail.seuServidor.com.br';
$email_smtp         = 'seuamail@seuservidor.com.br';
$porta              = '465';
$senha              = 'SuaSenha';


//Definindo a utilização da biblioteca do switf smtp - autoload
require_once 'vendor/autoload.php';

//Criando o transportador com o servidor de e-mail e a porta
//Utilizar SSL	
$transportador = (new Swift_SmtpTransport($servidor, $porta, 'ssl'))
  ->setUsername($email_smtp)
  ->setPassword($senha)
  ;
/*
//Utilizar TLS
$transportador = (new Swift_SmtpTransport($servidor, $porta, 'tls'))
  ->setUsername($email_smtp)
  ->setPassword($senha)
  ;

//Não Utilizar nem SSL nem TLS
 $transportador = (new Swift_SmtpTransport($servidor, $porta))
 ->setUsername($email_smtp)
  ->setPassword($senha)
  ;
*/
//Se o email estiver definido, prossegue com o envio do e-mail
if(isset($_POST['email'])){
    //Puxando os campos a partir do formulário enviado
    $assunto    = "Contato feito Através do Meu site"; 	
    $nome       = addslashes($_POST['nome']);
    $email      = addslashes($_POST['email']);
    $corpo      = $_POST['mensagem'];

    //Criando o sistema de email
    $envio = new Swift_Mailer($transportador);

    //Criando o bloco de mensagem do e-mail com remetente, destinatário, assunto e o corpo (texto) do email
    $mensagem = (new Swift_Message($assunto))
      ->setFrom([$email => $nome])
      ->setTo([$email_destinatario => $nome_destinatario])
      ->setBody('<b>De:</b> '.$nome.' &lt;'.$email.'&gt;<br><br><b>Mensagem:</b><br>'.$corpo, 'text/html') //'text/html' serve para deixar em html o texto que eu estou enviando
      ;

    //Envia
    $final = $envio->send($mensagem); 
    if($final){		
        //Se enviou corretamente o e-mail, notifica o usuário
        echo '<script>alert("E-mail enviado com sucesso!");';
        //e redireciona para a página inicial.
        echo 'window.location.href = "index.php"; </script>';
    }else{
        //Se houve alguma falha no envio, notifica o usuário
        echo '<script>alert("Ocorreu um erro ao enviar o e-mail. Tente novamente em alguns instantes.");';
        //e volta para a página anterior, mantendo os dados preenchidos no formulário.
        echo 'window.history.back();</script>';
    }
}else{
    //Se o assunto não estiver definido, exibe um alerta
    echo '<script>alert("Você deve preencher todas as informações para prosseguir com a solicitação!");</script>';
    //e redireciona novamente para o formulário de contato.
    header("Location: index.php");
}


 

?>
