<?php
  include("../includes/conexao.php");
  $id        = $_POST["id"];
  $modo      = $_POST["modo"];
  $categoria = $_POST["categoria"];

  if ($modo == 0){
	  $inserir = mysqli_query($conexao,"insert into tb_categorias VALUES (0, '$categoria')");
	  if ($inserir){
		 echo "Categoria Gravada com sucesso!" ; 
	  }else{
		  echo "Falha ao tentar gravar categoria";
	  }
  }else{
	  $alterar = mysqli_query($conexao,"update tb_categorias SET nome = '$categoria' where id = '$id'");
	  if ($alterar){
		 echo "Categoria Atualizada com sucesso!" ; 
	  }else{
		  echo "Falha ao tentar atualizar categoria";
	  }
  }
?>