<?php
  include("../includes/conexao.php");
  $id_categoria = $_POST["categoria"];
  $subcats = mysqli_query($conexao,"select * from tb_subcategorias where id_categoria = '$id_categoria' order by id");

  if (mysqli_num_rows($subcats)==0){
	echo "<option value='0'>Nenhuma Subcategoria encontrada para a categoria selecionada</option>" ;  
  }

   while ($subcategorias = mysqli_fetch_assoc($subcats)){
	  echo "<option value='".$subcategorias["id"]."'>".$subcategorias["nome"]."</option>" ;
   }

?>