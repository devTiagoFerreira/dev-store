<?php
  $id = $_POST["id"];
  include("../includes/conexao.php");
  
 $ehcapa = mysqli_query($conexao, "select * from tb_produtos_fotos where id = '$id'");
 $capa = mysqli_fetch_assoc($ehcapa);

  if ($capa["capa"]){
	  $id_produto      = $capa["id_produto"];
	  
	  
	  $idNovaCapa = mysqli_query($conexao, "select  max(id) as novoid from tb_produtos_fotos where id_produto = '$id_produto' and capa = false");	  
	  $produto = mysqli_fetch_assoc($idNovaCapa);
	  
	  $id_capa    = $produto["novoid"];
	  
	mysqli_query($conexao, "update tb_produtos_fotos set capa = true  where id_produto = '$id_produto ' and id = '$id_capa' ");  
  }

  $foto    = mysqli_query($conexao, "select * from tb_produtos_fotos where id = '$id'");
  $fotoselecionada = mysqli_fetch_assoc($foto);
  if (file_exists('fotos/'.$fotoselecionada["foto"])){
	 unlink('fotos/'.$fotoselecionada["foto"]);
  }
  $excluir = mysqli_query($conexao, "delete from tb_produtos_fotos where id = '$id'");
  if ($excluir){
	 echo "Registro removido com sucesso!";  
  }else{
	  echo "Falha!";
  }
 
?>