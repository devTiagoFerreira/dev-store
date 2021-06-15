
	<table class="table table-report -mt-2">
		<thead>
			<th width="5%">ID</th>
			<th>SubCategoria</th>
			<th>Produto</th>
			<th>Ações</th>
		</thead>
		<?php
	  include("../includes/conexao.php");
	  $subcategoria = mysqli_query($conexao,"select tp.id, ts.nome as subcategoria, tp.nome from tb_produtos tp inner join tb_subcategorias ts on ts.id = tp.id_subcategoria order by tp.id");
	  while ($lista = mysqli_fetch_assoc($subcategoria)){
		echo '<tr class="intro-x">';
		echo '<th>'.$lista["id"].'</td>';
		echo '<td>'.$lista["subcategoria"].'</td>';
		echo '<td>'.$lista["nome"].'</td>';
		echo '<td><div class="flex justify-center items-center">
		 <a class="flex items-center mr-3 btnFoto" href="javascript:;" data-toggle="modal" data-target="#basic-modal-preview">
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image mx-auto"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>Inserir Fotos</a>
		 
                                            <a class="flex items-center mr-3 btnAlterar" href=""> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg> Alterar </a>
											
                                            <a class="flex items-center text-theme-6 btnExcluir" href="" data-toggle="modal" data-target="#delete-confirmation-modal"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 w-4 h-4 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Excluir </a>
											
											
                                        </div></td>';
		echo '</tr>';
	  }
	?>
		
	</table>
	
	
	
	
	 
	 <div class="modal" id="basic-modal-preview"> 
	   <div class="modal__content p-10 text-center"> 
	   Escolha uma foto para incluir
	   <form data-single="true" action="produtos/upload.php" id="frmFoto" method="post" enctype="multipart/form-data"> 
         <input type="hidden" id="id_produto" name="id_produto">
	     <input type="file" name="foto" id="foto"> <button type="submit" class="button w-24 justify-center block bg-theme-1 text-white ml-2" id="BtnIncFoto">Incluir</button>
	     
	     <br>
	    <div class="modal-footer">  
        <button type="button" class="button w-24 justify-left block bg-theme-2" data-dismiss="modal">Fechar</button>
      </div>
	   </form>
	   
	   <div class="container" id="ListarFotos">
	   	 Fotos serão exibidas aqui!
	   </div>
	   
	   </div>  
	   </div> 

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="http://malsup.github.com/jquery.form.js"></script> 
	<script>
  $( document ).ready(function() {
	
	  
	  $("#BtnIncFoto").click(function(){		 
		//  alert('veio aqui');		 
		  		$('#frmFoto').ajaxForm(function(retorno) { 		   alert(retorno); 				
				$("#ListarFotos").load("produtos/listarFotos.php?id_produto="+$("#id_produto").val());
				});	
		  
	  })
	   

	  
	
	  
	  $(".btnFoto").click(function(e) {
		 e.preventDefault();
		 var 
		   id = $(this).parent().parent().parent().find("th").html();
		   $("#id_produto").val(id);
		$("#ListarFotos").load("produtos/listarFotos.php?id_produto="+id);
		 
	 });
	  
	 $(".btnExcluir").click(function(e) {
		 e.preventDefault();
		 var 
		   id = $(this).parent().parent().parent().find("th").html();	 
		  
		   if (confirm('Tem certeza que deseja apagar este Produto?') ){
			   
			 $.post("produtos/excluir.php",{id:id}, function(resultado){
			    alert(resultado);  
				$("#Listar").load("produtos/listar.php");
		     }) 
			 
		   }		   
         
	 });
	  
	$(".btnAlterar").click(function(e) {  
	  e.preventDefault();
		 var 
		   id = $(this).parent().parent().parent().find("th").html();	
		  //  alert(id);
		   $.getJSON("produtos/alterar.php?id="+id, function(resultado){
			    $("#modo").val(1);
			  // alert(resultado.nome);
			  $("#categoria").val(resultado.id_categoria).change();
			  $("#subcategoria").val(resultado.id_subcategoria).change();
			  $("#nome").val(resultado.nome);
			  $("#estoque").val(resultado.estoque);
			  $("#valor").val(resultado.valor);
			  $("#valor").val(resultado.valor);
			
			   if (resultado.ativo == 0){
				 $('#ativo').prop('checked', false);   
			   }else{
				  $('#ativo').prop('checked', true);   
			   }
			   
			  //$("#ativo").prop(":checked",resultado.ativo) ;
			   
			  $("#id").val(resultado.id);
			 
		  }) 
			   
	});
	  
});
</script>