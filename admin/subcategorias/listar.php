<table class="table table-report -mt-2">
		<thead>
			<th width="5%">ID</th>
			<th>Categoria</th>
			<th>SubCategoria</th>
			<th>Ações</th>
		</thead>
		<?php
	  include("../includes/conexao.php");
	  $subcategoria = mysqli_query($conexao,"select ts.id, tc.nome as categoria, ts.nome from tb_subcategorias ts inner join tb_categorias tc on tc.id = ts.id_categoria order by ts.id");
	  while ($lista = mysqli_fetch_assoc($subcategoria)){
		echo '<tr class="intro-x">';
		echo '<th>'.$lista["id"].'</td>';
		echo '<td>'.$lista["categoria"].'</td>';
		echo '<td>'.$lista["nome"].'</td>';
		echo '<td><div class="flex justify-center items-center">
                                            <a class="flex items-center mr-3 btnAlterar" href=""> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg> Alterar </a>
											
                                            <a class="flex items-center text-theme-6 btnExcluir" href="" data-toggle="modal" data-target="#delete-confirmation-modal"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 w-4 h-4 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Excluir </a>
                                        </div></td>';
		echo '</tr>';
	  }
	?>
		
	</table>
	<script>
  $( document ).ready(function() {
	  
	 $(".btnExcluir").click(function(e) {
		 e.preventDefault();
		 var 
		   id = $(this).parent().parent().parent().find("th").html();	 
		  
		   if (confirm('Tem certeza que deseja apagar esta subcategoria?') ){
			   
			 $.post("subcategorias/excluir.php",{id:id}, function(resultado){
			    alert(resultado);  
				$("#Listar").load("subcategorias/listar.php");
		     }) 
			 
		   }		   
         
	 });
	  
	$(".btnAlterar").click(function(e) {  
	  e.preventDefault();
		 var 
		   id = $(this).parent().parent().parent().find("th").html();	
		  
		   $.getJSON("subcategorias/alterar.php?id="+id, function(resultado){
			  $("#modo").val(1);
			  $("#categoria").val(resultado.id_categoria).change();
			  $("#nome").val(resultado.nome);
			  $("#id").val(resultado.id);
			 
		  }) 
			   
	});
});
</script>