<?php
  include("../includes/conexao.php");
  $id           = $_POST["id"];
  $modo         = $_POST["modo"];
  $subcategoria = $_POST["subcategoria"];
  $produto      = $_POST["nome"];
  $valor        = $_POST["valor"];
  $estoque      = $_POST["estoque"];
  if ($_POST["ativo"] == 'true'){
	  $ativo        = 1;
  }else{
	  $ativo        = 0;
  }
 

  if ($modo == 0){
	  $inserir = mysqli_query($conexao,"insert into tb_produtos VALUES (0, '$subcategoria', '$produto','$estoque','$valor', '$ativo')")or die(mysqli_error($conexao));
	  if ($inserir){
		 echo "Produto Gravado com sucesso!" ; 
	  }else{
		  echo "Falha ao tentar gravar Produto";
	  }
  }else{
	  $alterar = mysqli_query($conexao,"update tb_produtos SET id_subcategoria = '$subcategoria', nome = '$produto', estoque = '$estoque', valor = '$valor', ativo = '$ativo' where id = '$id'");
	  if ($alterar){
		 echo "Produto Atualizado com sucesso!" ; 
	  }else{
		  echo "Falha ao tentar atualizar o Produto";
	  }
  }
?>