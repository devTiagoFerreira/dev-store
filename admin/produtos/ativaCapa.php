<?php
  $id_produto = $_POST["id_produto"];
  $id_foto    = $_POST["id_foto"];
  $capa       = $_POST["capa"];
  include("../includes/conexao.php");
   
  if ($capa == 'true'){
	$desmarcaTodos    = mysqli_query($conexao, "update tb_produtos_fotos set capa = false where id_produto = '$id_produto';");
	  
	$marcaaNovaCapa  = mysqli_query($conexao, "update tb_produtos_fotos set capa = true where id = '$id_foto';");	
	 
	  
  }else{
	echo "0";   
  }


 
?>