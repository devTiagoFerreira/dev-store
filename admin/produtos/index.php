
           <div class="intro-y col-span-12 sm:col-span-12">  
                <div class="font-medium text-base">Novo Produto</div>
</div>
              
               <div class="intro-y col-span-4 sm:col-span-4">
                            <div class="mb-2">Categoria</div>
                            <select name="categoria" id="categoria" class="select2 w-full">
                              <option value="0" selected>Escolha a Categoria</option>
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
                            <div class="mb-2">SubCategoria</div>
                            <select name="subcategoria" id="subcategoria" class="select2 w-full">
                            	<option value="0">Escolha uma Categoria</option>
                            </select>
                       
                          </div>
              
               <div class="intro-y col-span-4 sm:col-span-4">
                            <div class="mb-2">Descrição</div>
                            <input type="text" name="nome" id="nome" class="input w-full border flex-1" placeholder="Informe a descrição">
                       
                  </div>
                        
                    <div class="intro-y col-span-4 sm:col-span-4">
                            <div class="mb-2">Estoque</div>
                            <input type="text" name="estoque" id="estoque" class="input w-full border flex-1" placeholder="Informe a SubCategoria">
                       
                  </div>
                         <div class="intro-y col-span-4 sm:col-span-4">
                            <div class="mb-2">Valor</div>
                            <input type="text" name="valor" id="valor" class="input w-full border flex-1" placeholder="Informe a SubCategoria">
                       
                  </div>
                    <div class="col-span-4 sm:col-span-4">
                            <div class="mb-2">Ativo</div>
                            <input class="input input--switch border" type="checkbox" name="ativo" id="ativo" checked>
                       
                  </div>
                         
                          <input type="hidden" value="0" id="modo">
                          <input type="hidden" value="0" id="id">
<button class="button w-24 justify-center block bg-theme-1 text-white ml-2" id="btnProduto">Gravar</button>

<br>
 <div class="intro-y col-span-12 sm:col-span-12">  
<div class="container" id="Listar">
	
</div>

</div>
<script>
  $( document ).ready(function() {
	  
	  $("#Listar").load("produtos/listar.php");
	  
	 $("#categoria").change(function(){
		 var categoria = $(this).val();
		 $.post("produtos/subcategorias.php",{categoria:categoria}, function(retorno){
			 $("#subcategoria").html(retorno);
		 })
	 })
	  
	 $("#btnProduto").click(function() {
       var 
		   subcategoria = $("#subcategoria").val(),
		   nome         = $("#nome").val(),
		   estoque      = $("#estoque").val(),
		   valor        = $("#valor").val(),
		   ativo        =  $("#ativo").is(":checked"),
		   modo         = $("#modo").val(),
		   id           = $("#id").val();
		 
		
		   if ($.trim(subcategoria) == '0'){
			  alert('Informe a Sub Categoria');
		      $("$subcategoria").focus();
		      return false;
		   }
		 if ($.trim(nome) == ''){
			  alert('Informe o Produto');
		      $("$nome").focus();
		      return false;
		   }
		 
		 $.post("produtos/salvar.php",{subcategoria:subcategoria,nome:nome,estoque:estoque,valor:valor,ativo:ativo,id:id, modo:modo},function(retorno){
			$("#Listar").load("produtos/listar.php");
			alert(retorno); 
			$("#modo").val(0);
			$("#id").val(0);
			$("#categoria").val(0).change();
			$("#nome").val("");
			$("#estoque").val("");
			$("#valor").val("");
			$('#ativo').prop('checked', true); 
			$("#nome").focus();
		 });
	 });
});
</script>


