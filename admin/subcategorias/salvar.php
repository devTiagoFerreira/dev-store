<?php
  include("../includes/conexao.php");
  $id          = $_POST["id"];
  $modo        = $_POST["modo"];
  $categoria   = $_POST["categoria"];
  $subcategoria = $_POST["subcategoria"];

  if ($modo == 0){
	  $inserir = mysqli_query($conexao,"insert into tb_subcategorias VALUES (0, '$categoria', '$subcategoria')");
	  if ($inserir){
		 echo "SubCategoria Gravada com sucesso!" ; 
	  }else{
		  echo "Falha ao tentar gravar Subcategoria";
	  }
  }else{
	  $alterar = mysqli_query($conexao,"update tb_subcategorias SET id_categoria = '$categoria', nome = '$subcategoria' where id = '$id'");
	  if ($alterar){
		 echo "SubCategoria Atualizada com sucesso!" ; 
	  }else{
		  echo "Falha ao tentar atualizar Subcategoria";
	  }
  }
?>