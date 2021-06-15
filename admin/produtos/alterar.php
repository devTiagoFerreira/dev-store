<?php
  $id = $_GET["id"];
  include("../includes/conexao.php");
  $alterar = mysqli_query($conexao, "select tp.id, ts.id_categoria id_categoria, tp. id_subcategoria, tp.nome, tp.estoque, tp.valor, tp.ativo from tb_produtos tp LEFT JOIN tb_subcategorias ts on ts.id = tp.id_subcategoria where tp.id = '$id'");
  $resultado = mysqli_fetch_array($alterar);
  extract($resultado);
  echo json_encode($resultado);

?>