
           <div class="intro-y col-span-12 sm:col-span-12">  
                <div class="font-medium text-base">Nova Categoria</div>
</div>
               <div class="intro-y col-span-12 sm:col-span-6">
                            <div class="mb-2">Descrição</div>
                            <input type="text" name="nome" id="nome" class="input w-full border flex-1" placeholder="Informe a Categoria">
                       
                          </div>
<button class="button w-24 justify-center block bg-theme-1 text-white ml-2" id="btnCategoria">Gravar</button>

<br>
 <div class="intro-y col-span-12 sm:col-span-12">  
<div class="container" id="Listar">
	
</div>

</div>
<script>
  $( document ).ready(function() {
	  
	  $("#Listar").load("categorias/listar.php");
	  
	 $("#btnCategoria").click(function() {
       var categoria = $("#nome").val();
		 $.post("categorias/salvar.php",{categoria:categoria},function(retorno){
			$("#Listar").load("categorias/listar.php");
			alert(retorno); 
			$("#nome").val("");
			$("#nome").focus();
		 });
	 });
});
</script>


