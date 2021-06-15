<div class="container">
	<div class="row">
		<h2 class="titulo-car">Carrinho de Compras</h2>
	</div>

   <div class="row">
<table border="1" cellpadding="0" cellspacing="0" class="table">
	<tr>
		<td>Código</td>
		<td>Descrição</td>
		<td>Valor Un.</td>
		<td>Qtd.</td>
		<td>Valor Total</td>
		<td>Remover</td>
	</tr>
	<?php
	  
	function agrupa($arr, $chave){
		$tmpItens = array();
		foreach ($arr as $cod =>$item){
			if (isset($tmpItens[$item[$chave]])){
				$item["qtd"] = $tmpItens[$item[$chave]]["qtd"] + $arr[$cod]["qtd"];
				$tmpItens[$item[$chave]] = $item;
			}else{
				$tmpItens[$item[$chave]] = $item;
			}			
		}
		return $tmpItens;
	}
	  
	
	  include_once("admin/includes/conexao.php");
	  $_SESSION["produtos"] = agrupa($_SESSION["produtos"], 'cod_produto');
	
	  if (count($_SESSION["produtos"])==0){
		echo '<tr><td colspan="6">Nenhum Produto inserido no Carrinho</td></tr>'  ;
	  }else{
		  $total = 0;
		  foreach ($_SESSION["produtos"] as $lista){
			  $codigo = $lista["cod_produto"];
			  $prod = mysqli_query($conexao, "select * from tb_produtos where id = '$codigo'");
			  $produto = mysqli_fetch_assoc($prod);
			  echo '<tr class="produtos-car">';
			  echo "<td>$codigo</td>";
			  echo "<td>".$produto["nome"]."</td>";
			  echo "<td>R$ ".number_format($produto["valor"],'2',',','.')."</td>";
			  echo "<td>".$lista["qtd"]."</td>";		
			  echo "<td>R$ ".number_format($lista["qtd"] * $produto["valor"],'2',',','.')."</td>";
			  echo "<td><a href='delCarrinho.php?id=$codigo' >X</a>";
			  echo '</tr>'; 
			  $total += $lista["qtd"] * $produto["valor"];
		  }

		  echo "<tr class='total'><td colspan='6'> Total R$ ". number_format($total, '2', ',', '.') ."</td></tr>";

		  
	  }
	
	?>
	
	
</table>

</div>

</div>