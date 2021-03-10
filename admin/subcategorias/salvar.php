<?php
include("../includes/conexao.php");
$id        = $_POST["id"];
$modo      = $_POST["modo"];
$subcategoria = $_POST["subcategoria"];
$catSelecionada = $_POST["catSelecionada"];

if ($modo == 0) {
	$inserir = mysqli_query($conexao, "insert into tb_subcategorias VALUES (0, '$catSelecionada', '$subcategoria')");
	if ($inserir) {
		echo "Subcategoria gravada com sucesso!";
	} else {
		echo "Falha ao tentar gravar subcategoria";
	}
} else {
	$alterar = mysqli_query($conexao, "update tb_subcategorias SET nome = '$subcategoria' where id = '$id'");
	if ($alterar) {
		echo "Subcategoria atualizada com sucesso!";
	} else {
		echo "Falha ao tentar atualizar subcategoria";
	}
}
