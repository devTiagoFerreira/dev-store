<?php
  $id = $_GET["id"];
  include("../includes/conexao.php");
  $alterar = mysqli_query($conexao, "select * from tb_produtos where id = '$id'");
  $resultado = mysqli_fetch_array($alterar);
  extract($resultado);
  echo json_encode($resultado);
