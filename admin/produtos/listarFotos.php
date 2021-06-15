<?php
  $id = $_GET["id_produto"];
  include("../includes/conexao.php");
  $listaFotos = mysqli_query($conexao,"select * from tb_produtos_fotos where id_produto = '$id'");

echo '
<table class="table table-report -mt-2">
		<thead>
			<th width="5%">ID</th>
			<th>Foto</th>	
			<th>Capa</th>	
			<th>Ações</th>
		</thead>
';

  while ($lista = mysqli_fetch_assoc($listaFotos)){
	 if ($lista["capa"]){
		$capa = 'checked';
	 }else{
		$capa = ''; 
	 }
	echo '<tr class="intro-x">';
		echo '<th>'.$lista["id"].'</td>';
		echo '<td><img src="produtos/fotos/'.$lista["foto"].'" width="100" height="100"></td>';
		echo '<td><input class="input input--switch border Ativacapa" type="checkbox" name="capa" id="capa" '.$capa.'></td>';
		echo '<td>	 
                                        
											
                                            <a class="flex items-center text-theme-6 btnExcluirFoto" href="" data-toggle="modal" data-target="#delete-confirmation-modal"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 w-4 h-4 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Excluir </a>
											
											
                                        </div></td>';
		echo '</tr>';  
  }
?>


</table>


	<script>
  $( document ).ready(function() {
	
	 $(".btnExcluirFoto").click(function(e) {
		 e.preventDefault();
		 var 
		   id = $(this).parent().parent().find("th").html();	
		 ;
		
		  
		   if (confirm('Tem certeza que deseja apagar esta foto?') ){
			   
			 $.post("produtos/excluirFoto.php",{id:id}, function(resultado){
			    alert(resultado);  
				$("#ListarFotos").load("produtos/listarFotos.php?id_produto="+$("#id_produto").val());
		     }) 
			 
		   }		   
         
	 });
	  
	  $(".Ativacapa").change(function(){
		// alert( $(this).is(":checked") );
		  var 
		   id_foto = $(this).parent().parent().find("th").html(),
		   capa = $(this).is(":checked");
		 //  alert(id_foto);
		  
		  $.post("produtos/ativaCapa.php",{id_produto:$("#id_produto").val(), id_foto:id_foto, capa:capa}, function(resultado){
			     if (resultado == '0'){
					 alert('Você precisa ter Uma capa!!');
				 }
				 $("#ListarFotos").load("produtos/listarFotos.php?id_produto="+$("#id_produto").val());	 
				 
			    
				
		     }) 
		  
	  })
	  
	  
	  });
</script>