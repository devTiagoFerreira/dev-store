<div class="intro-y col-span-12 sm:col-span-12">
	<div class="font-medium text-base">Nova Subcategoria</div>
</div>

<div class="intro-y col-span-4 sm:col-span-4">

	<div class="mb-2">Categoria</div>
	<select name="categoria" class="select2 w-full" id="select-cat">
		<?php
		$catS;
		include "includes/conexao.php";
		$categorias = mysqli_query($conexao, "select * from tb_categorias order by nome");
		while ($cat = mysqli_fetch_assoc($categorias)) {
			if (!$catS) {
				$catselect = $cat["id"];
				$catS = true;
			}
			echo '<option value="' . $cat["id"] . '">' . $cat["nome"] . '</option>';
		}
		?>
	</select>

</div>

<div class="intro-y col-span-4 sm:col-span-4">
	<div class="mb-2">Subcategorias</div>
	<select name="subcategoria" class="select2 w-full" id="select-subcat">
		<?php
		$sub;
		$subcategorias = mysqli_query($conexao, "select * from tb_subcategorias where id_categoria = '$catselect' order by nome");
		while ($subcat = mysqli_fetch_assoc($subcategorias)) {
			if (!$sub) {
				echo '<option selected="selected" value="' . $subcat["id"] . '">' . $subcat["nome"] . '</option>';
				$sub = true;
			} else {
				echo '<option value="' . $subcat["id"] . '">' . $subcat["nome"] . '</option>';
			}
		}
		?>
	</select>
</div>

<div class="intro-y col-span-4 sm:col-span-4">
	<div class="mb-2">Nome</div>
	<input type="text" name="nome" id="nome" class="input w-full border flex-1" placeholder="Nome">
</div>

<div class="intro-y col-span-4 sm:col-span-4">
	<div class="mb-2">Descrição</div>
	<input type="text" name="descricao" id="descricao" class="input w-full border flex-1" placeholder="Descrição">
</div>

<div class="intro-y col-span-4 sm:col-span-4">
	<div class="mb-2">Preço</div>
	<input type="text" name="preco" id="preco" class="input w-full border flex-1" placeholder="00,00">

</div>

<div class="intro-y col-span-4 sm:col-span-4">
	<div class="mb-2">Quantidade</div>
	<input type="text" name="quant" id="quant" class="input w-full border flex-1" placeholder="Quantidade">

</div>

<input type="hidden" value="0" id="modo">
<input type="hidden" value="0" id="id">
<button class="button w-24 justify-center block bg-theme-1 text-white ml-2" id="btnCategoria">Gravar</button>


<br>
<div class="intro-y col-span-12 sm:col-span-12">
	<div class="container" id="Listar">

	</div>

</div>
<script>
	$(document).ready(function() {
		var catSelecionada = $("#select-cat option:selected").val();
		var subcatSelecionada = $("#select-subcat option:selected").val();

		$("#btnCategoria").css("transition", "0.5s");

		$("#Listar").load("produtos/listar.php?id=" + subcatSelecionada);

		$("#select-cat").change(function(e) {
			catSelecionada = $("#select-cat option:selected").val();
			$("#modo").val(0);
			$("#nome").val("");
			$("#nome").focus();
			$("#btnCategoria").text("Gravar");
			$("#btnCategoria").css("backgroundColor", "rgba(28, 63, 170, var(--bg-opacity))");
			$("#select-subcat").load("produtos/listarsubcat.php?id=" + catSelecionada);
		});

		$("#select-subcat").change(function(e) {
			subcatSelecionada = $("#select-subcat option:selected").val();
			$("#modo").val(0);
			$("#nome").val("");
			$("#descricao").val("");
			$("#preco").val("");
			$("#quant").val("");
			$("#nome").focus();
			$("#btnCategoria").text("Gravar");
			$("#btnCategoria").css("backgroundColor", "rgba(28, 63, 170, var(--bg-opacity))");
			$("#Listar").load("produtos/listar.php?id=" + subcatSelecionada);
		});

		$("#btnCategoria").click(function() {
			var nome = $("#nome").val(),
				descricao = $("#descricao").val(),
				preco = $("#preco").val().replace(',', '.'),
				preco = parseFloat(preco);
			quant = parseInt($("#quant").val()),
				modo = $("#modo").val(),
				id = $("#id").val();
			subcatSelecionada = $("#select-subcat option:selected").val();
			$("#btnCategoria").text("Gravar");
			$("#btnCategoria").css("backgroundColor", "rgba(28, 63, 170, var(--bg-opacity))");
			$.post("produtos/salvar.php", {
				nome: nome,
				descricao: descricao,
				preco: preco,
				quant: quant,
				subcategoria: subcatSelecionada,
				id: id,
				modo: modo,
			}, function(retorno) {
				$("#Listar").load("produtos/listar.php?id=" + subcatSelecionada);
				alert(retorno);
				$("#modo").val(0);
				$("#id").val(0);
				$("#nome").val("");
				$("#nome").focus();
				$("#descricao").val("");
				$("#preco").val("");
				$("#quant").val("");
			});
		});
	});
</script>