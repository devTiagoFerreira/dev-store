<?php
include("../includes/conexao.php");
$nome       = $_POST["nome"];
$descricao     = $_POST["descricao"];
$preco = $_POST["preco"];
$quant = $_POST["quant"];
$id        = $_POST["id"];
$modo      = $_POST["modo"];
$subcategoria = $_POST["subcategoria"];

if ($subcategoria != 0) {
	if ($modo == 0) {
		$inserir = mysqli_query($conexao, "insert into tb_produtos values (0, '$subcategoria', '$nome', '$descricao', '$quant', '$preco', default)");
		if ($inserir) {
			echo "Produto gravado com sucesso!";
		} else {
			echo "Falha ao tentar gravar produto";
		}
	} else {
		$alterar = mysqli_query($conexao, "update tb_produtos set nome = '$nome', descricao = '$descricao', estoque = '$quant', valor = '$preco' where id = '$id'");
		if ($alterar) {
			echo "Produto atualizado com sucesso!";
		} else {
			echo "Falha ao tentar atualizar produto";
		}
	}
} else {
	echo "Selecione um subcategoria!";
}
