<?php
  include("../includes/conexao.php");
  $categoria = $_POST["categoria"];
  $inserir = mysqli_query($conexao,"insert into tb_categorias VALUES (0, '$categoria')");
  if ($inserir){
	 echo "Categoria Gravada com sucesso!" ; 
  }else{
	  echo "Falha ao tentar gravar categoria";
  }

?>