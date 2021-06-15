<?php
  $id = $_POST["id"];
  include("../includes/conexao.php");
  $excluir = mysqli_query($conexao, "delete from tb_categorias where id = '$id'");
  if ($excluir){
	 echo "Resgistro removido com sucesso!";  
  }else{
	  echo "Falha!";
  }
 
?>