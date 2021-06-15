<?php
    $nome     = $_POST["nome"];
	$email    = $_POST["email"];
	$senha    = $_POST["senha"];
	$cpf      = $_POST["cpf"];
	$telefone = $_POST["telefone"];
	$endereco = $_POST["endereco"];
	$numero   = $_POST["numero"];
	$bairro   = $_POST["bairro"];
	$cep      = $_POST["cep"];
	$estado   = $_POST["estado"];
	$cidade   = $_POST["cidade"];
    
    if (empty(trim($nome))){
	  echo '<div class="alert alert-danger" role="alert">
		  Favor preencha o Nome
		</div>';	
	}else if(strlen(trim($email))<3){
		 echo '<div class="alert alert-danger" role="alert">
		  Informe um email válido
		</div>';
	}else{
		

   
    include_once("admin/includes/conexao.php");
		
	
	$emailCadastrado = mysqli_query($conexao,"select email from tb_clientes where email = '$email'");
	if (mysqli_num_rows($emailCadastrado)>0){
		echo '<div class="alert alert-danger" role="alert">
		  Este email: '.$email.' já foi cadastrado
		</div>';
	}else{
		

		$inseriu = mysqli_query($conexao,"insert into tb_clientes VALUES(0,'$nome','$cpf','$telefone','$email','$senha','$endereco','$numero','$bairro','$cep','$estado','$cidade')");

		if($inseriu){
			echo '<div class="alert alert-success" role="alert">
	  Cadastro Efetuado com Sucesso! Agora você já pode fazer o seu login!
	</div>';
		}else{
			echo '<div class="alert alert-danger" role="alert">
			  Erro ao efetuar Cadastro!
			</div>';
			}

		}
	}
?>