<?php
  include("../includes/conexao.php");
  $id = $_POST["id_produto"];
  $foto = $_FILES["foto"];
  $nome = md5(uniqid()) . time() . '.jpg';
  $caminho = "fotos/".$nome;
  
  if (move_uploaded_file($foto["tmp_name"],$caminho)){
	  $possuicapa = mysqli_query($conexao, "select * from tb_produtos_fotos where id_produto = '$id' and capa = true");
	 if (mysqli_num_rows($possuicapa)>0){
		$capa = false; 
	 } else{
		$capa = true; 
	 }
		 
    $inserir = mysqli_query($conexao,"insert into tb_produtos_fotos VALUES(0,'$id','$nome', '$capa')");
	  
	  if ($inserir){
		 echo "Foto enviada com sucesso!" ; 
	  }else{
		  echo "erro ao gravar foto";
	  }
	  
  }else{
	  echo "Erro ao subir arquivo";
  }
  
?>