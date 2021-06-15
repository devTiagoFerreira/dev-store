
           <div class="intro-y col-span-12 sm:col-span-12">  
                <div class="font-medium text-base">Nova SubCategoria</div>
</div>
              
               <div class="intro-y col-span-4 sm:col-span-4">
                            <div class="mb-2">Categoria</div>
                            <select name="categoria" id="categoria" class="select2 w-full">
                            	<?php
								  include "includes/conexao.php";
								  $categorias = mysqli_query($conexao,"select * from tb_categorias order by nome");
								  while ($cat = mysqli_fetch_assoc($categorias)){
									  echo '<option value="'.$cat["id"].'">'.$cat["nome"].'</option>';
								  }
								?>
                            </select>
                       
                          </div>
              
               <div class="intro-y col-span-4 sm:col-span-4">
                            <div class="mb-2">Descrição</div>
                            <input type="text" name="nome" id="nome" class="input w-full border flex-1" placeholder="Informe a SubCategoria">
                       
                          </div>
                          <input type="hidden" value="0" id="modo">
                          <input type="hidden" value="0" id="id">
<button class="button w-24 justify-center block bg-theme-1 text-white ml-2" id="btnSubCategoria">Gravar</button>

<br>
 <div class="intro-y col-span-12 sm:col-span-12">  
<div class="container" id="Listar">
	
</div>

</div>
<script>
  $( document ).ready(function() {
	  
	  $("#Listar").load("subcategorias/listar.php");
	  
	 $("#btnSubCategoria").click(function() {
       var categoria = $("#categoria").val(),
		   subcategoria = $("#nome").val(),
		   modo = $("#modo").val(),
		   id = $("#id").val();
		   if ($.trim(subcategoria) == ''){
			  alert('Informe a Sub Categoria');
		      $("$nome").focus();
		      return false;
		   }
		 
		 $.post("subcategorias/salvar.php",{categoria:categoria,subcategoria:subcategoria, id:id, modo:modo},function(retorno){
			$("#Listar").load("subcategorias/listar.php");
			alert(retorno); 
			$("#modo").val(0);
			$("#id").val(0);
			$("#categoria").val(1);
			$("#nome").val("");
			$("#nome").focus();
		 });
	 });
});
</script>


