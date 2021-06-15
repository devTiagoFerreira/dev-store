 <link rel="stylesheet" href="css/modal-produtos.css" type="text/css">  
                     <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>  
                     
 <?php
  $id = $_GET["id"];
  $produtoselecionado = mysqli_query($conexao,"select tp.*, tpf.foto from tb_produtos tp 
LEFT JOIN tb_produtos_fotos tpf on tpf.id_produto = tp.id 
where tp.id = '$id' and tpf.capa = true");
  $produto = mysqli_fetch_assoc($produtoselecionado);

?>
                                               
                     <div class="produto">
                    <img id="FotoCapa" src="<?php echo 'admin/produtos/fotos/' .$produto["foto"] ;?>" alt="" width="150" height="350" />
                    <div class="desc-produto">
                        <div class="titulo"><?php echo $produto["nome"] ;?></div>
                        <div class="preco">R$ <span id="valor"><?php echo number_format($produto["valor"], 2, ',', '.')  ;?></span></div>
                        <div class="quant">
                            <button class="sub" onclick="subtrair()">
                                <ion-icon name="remove-circle-sharp"></ion-icon>
                            </button>
                            <div id="numero">1</div>
                            <button class="adc" onclick="adicionar()">
                                <ion-icon name="add-circle-sharp"></ion-icon>
                            </button>
                        </div>
                        <form method="get" action="addCarrinho.php">   
                        <input type="hidden" name="id" value="<?php echo $produto["id"] ;?>">
                        <input type="hidden" name="qtd" id="qtd" value="1">
                        <button class="add">Adicionar no Carrinho</button>
                        </form> 
                    </div>
                </div>
                <div class="outros-titulo">Mais fotos</h3>
                    <div class="outros-produtos">
                       <?php
						  $qryfotos = mysqli_query($conexao,"select * from tb_produtos_fotos where id_produto = '$id'");
						  while ($fotos = mysqli_fetch_assoc($qryfotos)){
							 echo '<img class="img-outros" src="admin/produtos/fotos/'.$fotos["foto"].'" alt="" />' ; 
						  }
						?>
                        

                      
                    </div>
                </div>
            </div>
          
            <script src="js/modal-produtos.js"></script>
        