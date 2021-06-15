 <?php
               if (isset($_GET["subcategoria"])){
				   //Filtra por SubCategoria
				   $subcategoria = $_GET["subcategoria"];
				   $produtos = mysqli_query($conexao,"SELECT tp.id, tp.nome as produto, tp.valor, tpf.foto, ts.nome as subcategoria FROM tb_produtos tp
inner join tb_produtos_fotos tpf on tpf.id_produto = tp.id 
inner join tb_subcategorias ts on ts.id = tp.id_subcategoria
WHERE tp.id_subcategoria= '$subcategoria' and tpf.capa = true and ativo = true limit 8");  
			   }else if (isset($_GET["search-input"])){
				   //Pesquisa o produto de acordo com a palavra informada na pesquisa
				   $valorPesquisa = $_GET["search-input"];
				   $produtos = mysqli_query($conexao,"SELECT tp.id, tp.nome as produto, tp.valor, tpf.foto, ts.nome as subcategoria FROM tb_produtos tp
inner join tb_produtos_fotos tpf on tpf.id_produto = tp.id 
inner join tb_subcategorias ts on ts.id = tp.id_subcategoria
WHERE upper(tp.nome) like upper('%$valorPesquisa%') and tpf.capa = true and ativo = true limit 8"); 
			   }else{
				   //tras oito produtos
				   $produtos = mysqli_query($conexao,"SELECT tp.id, tp.nome as produto, tp.valor, tpf.foto, ts.nome as subcategoria FROM tb_produtos tp
inner join tb_produtos_fotos tpf on tpf.id_produto = tp.id 
inner join tb_subcategorias ts on ts.id = tp.id_subcategoria
WHERE tpf.capa = true and ativo = true limit 8");  
			   }
				
                   //Verificamos se a consulta obteve resultado
                if (mysqli_num_rows($produtos)==0){
					echo "<h2>Nenhum produto encontrado</2>";
				}

				  while ($listaProdutos = mysqli_fetch_assoc($produtos)){
					 echo '
					  <div class="col-lg-3 col-md-6 col-sm-6">
                      <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="admin/produtos/fotos/'.$listaProdutos["foto"].'">
                            <div class="product__label">
                                <span>'.$listaProdutos["subcategoria"].'</span>
                            </div>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">'.$listaProdutos["produto"].'</a></h6>
                            <div class="product__item__price">R$ '.$listaProdutos["valor"].'</div>
                            <div class="cart_add">
                                <a href="?pg=VisualizarProduto&id='.$listaProdutos["id"].'">Comprar</a>
                            </div>
                        </div>
                    </div>
                </div>
					 ' ;
				  }
				
				?>