<?php
  session_start();
  $email = $_POST["email"];
  $senha = $_POST["senha"];
 // if (isset($_POST["lembrar"])){
//	$lembrar = true;  
 // }else{
//	$lembrar = false;  
//  }
  
  isset($_POST["lembrar"]) ? $lembrar = true : $lembrar = false;  
  

  include_once("admin/includes/conexao.php");

  $cliente = mysqli_query($conexao,"select * from tb_clientes where email = '$email' and senha = '$senha'");
   
  if (mysqli_num_rows($cliente)>0){
	$_SESSION["clienteLogado"] = mysqli_fetch_assoc($cliente);  
	header("Location: index.php");
  }else{
	echo '<div class="alert alert-danger" role="alert">
		  Email ou senha informados inválidos.
		</div>';
	  include("index.php");
  }

?>