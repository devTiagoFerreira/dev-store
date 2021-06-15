<?php
  session_start();
  if (isset($_SESSION["produtos"])){
	  $id = $_GET["id"];
	  unset($_SESSION["produtos"][$id]);
	  header("Location: index.php?pg=Carrinho");
  }else{
	 header("Location: index.php"); 
  }
  
?>