<div class="intro-y col-span-12 sm:col-span-12">
	<div class="font-medium text-base">Nova Subcategoria</div>
</div>

<div class="intro-y col-span-4 sm:col-span-4">
	<div class="mb-2">Categoria</div>
	<select name="categoria" class="select2 w-full" id="select-cat">
		<?php
		include "includes/conexao.php";
		$categorias = mysqli_query($conexao, "select * from tb_categorias order by nome");
		while ($cat = mysqli_fetch_assoc($categorias)) {
			echo '<option value="' . $cat["id"] . '">' . $cat["nome"] . '</option>';
		}
		?>
	</select>

</div>

<div class="intro-y col-span-4 sm:col-span-4">
	<div class="mb-2">Descrição</div>
	<input type="text" name="nome" id="nome" class="input w-full border flex-1" placeholder="Informe a Subcategoria">

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

		$("#btnCategoria").css("transition", "0.5s");

		$("#Listar").load("subcategorias/listar.php?id=" + catSelecionada);

		$("#select-cat").change(function(e) {
			catSelecionada = $("#select-cat option:selected").val();
			$("#modo").val(0);
			$("#nome").val("");
			$("#nome").focus();
			$("#btnCategoria").text("Gravar");
			$("#btnCategoria").css("backgroundColor", "rgba(28, 63, 170, var(--bg-opacity))");
			$("#Listar").load("subcategorias/listar.php?id=" + catSelecionada);


		});

		$("#btnCategoria").click(function() {
			var subcategoria = $("#nome").val(),
				modo = $("#modo").val(),
				id = $("#id").val();
			catSelecionada = $("#select-cat option:selected").val();
			$("#btnCategoria").text("Gravar");
			$("#btnCategoria").css("backgroundColor", "rgba(28, 63, 170, var(--bg-opacity))");
			$.post("subcategorias/salvar.php", {
				subcategoria: subcategoria,
				id: id,
				modo: modo,
				catSelecionada: catSelecionada
			}, function(retorno) {
				$("#Listar").load("subcategorias/listar.php?id=" + catSelecionada);
				alert(retorno);
				$("#modo").val(0);
				$("#id").val(0);
				$("#nome").val("");
				$("#nome").focus();
			});
		});
	});
</script>