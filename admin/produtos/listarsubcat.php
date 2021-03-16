	<?php
	$id_categoria = $_GET['id'];
	include "../includes/conexao.php";
	$sub;
	$subcategorias = mysqli_query($conexao, "select * from tb_subcategorias where id_categoria = '$id_categoria' order by nome");


	$linhas = mysqli_num_rows($subcategorias);

	if ($linhas == 0) {
		echo '<option selected="selected" value="">Nenhum registro encontrado!</option>';
	} else {
		while ($subcat = mysqli_fetch_assoc($subcategorias)) {
			if (!$sub) {
				echo '<option selected="selected" value="' . $subcat["id"] . '">' . $subcat["nome"] . '</option>';
				$sub = true;
			} else {
				echo '<option value="' . $subcat["id"] . '">' . $subcat["nome"] . '</option>';
			}
		}
	}


	?>
	<script>
	$(document).ready(function() {
			subcatSelecionada = $("#select-subcat option:selected").val();
			
			$("#Listar").load("produtos/listar.php?id=" + subcatSelecionada);

		$(".btnExcluir").click(function(e) {
			e.preventDefault();
			var
				id = $(this).parent().parent().parent().find("th").html();
			catSelecionada = $("#select-cat option:selected").val();
			if (confirm('Tem certeza que deseja apagar esta subcategoria?')) {

				$.post("subcategorias/excluir.php", {
					id: id
				}, function(resultado) {
					alert(resultado);
					$("#Listar").load("subcategorias/listar.php?id=" + catSelecionada);
				})

			}

		});

		$(".btnAlterar").click(function(e) {
			e.preventDefault();
			var
				id = $(this).parent().parent().parent().find("th").html();
			$.getJSON("subcategorias/alterar.php?id=" + id, function(resultado) {
				$("#modo").val(1);
				$("#nome").val(resultado.nome);
				$("#id").val(resultado.id);
				$("#btnCategoria").text("Atualizar");
				$("#btnCategoria").css("backgroundColor", "#F0C800");
			})

		});
	});
</script>