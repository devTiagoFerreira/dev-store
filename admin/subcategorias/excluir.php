<?php
  $id = $_POST["id"];
  include("../includes/conexao.php");
  $excluir = mysqli_query($conexao, "delete from tb_subcategorias where id = '$id'");
  if ($excluir){
	 echo "Registro removido com sucesso!";  
  }else{
	  echo "Falha!";
  }
 
?>