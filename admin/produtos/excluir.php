<?php
  $id = $_POST["id"];
  include("../includes/conexao.php");
  $excluir = mysqli_query($conexao, "update tb_produtos set ativo = false where id = '$id'");
  if ($excluir){
	 echo "Resgistro removido com sucesso!";  
  }else{
	  echo "Falha!";
  }
