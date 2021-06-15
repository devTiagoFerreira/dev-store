<?php
  @session_start();
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Cake Template">
    <meta name="keywords" content="Cake, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DevStore - Home</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/barfiller.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@200;400&display=swap" rel="stylesheet">  
  <style>
	  .img-outros{
		  cursor: pointer;		  
	  }
	  .img-outros:hover{
		  border:solid #D41417 6px;
	  }
	</style>  
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__cart">
            <div class="offcanvas__cart__links">
                <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
                <a href="#"></a>
            </div>
            <div class="offcanvas__cart__item">
                <a href="#"><img src="img/icon/cart.png" alt=""> <span>0</span></a>
                <div class="cart__price">Carrinho: <span>R$ 0,00</span></div>
            </div>
        </div>
        <div class="offcanvas__logo">
            <a href="./index.html"><img src="img/logo.webp" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__option">
            <ul>
                <li><a href="#">Login</a></li>
                <li><a href="#">Registre-se</a></span></li>
                <li><a href="#">Pedidos</a></span></li>
            </ul>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header__top__inner">
                            <div class="header__top__left">
                                <ul>
                                   <?php									 
									  if (isset($_SESSION["clienteLogado"])){
										echo "Bem vindo " . $_SESSION["clienteLogado"]["nome"];
										echo " <a href='sair.php'>Sair</a> | ";
									  }else{
										  echo '<li><a href="#Login">Login</a></li>
                                               <li><a href="#Registre">Registre-se</a></span></li>';
									  }
									?>
                                    
                                    <li><a href="#">Pedidos</a></span></li>
                                </ul>
                            </div>
                            <div class="header__logo">
                                <a href="./index.html"><img src="img/logo.webp" alt="">devStore</a>
                            </div>
                            <div class="header__top__right">
                                <div class="header__top__right__links">
                                    <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
                                    <a href="#"></a>
                                </div>
                                <div class="header__top__right__cart">
                                    <a href="?pg=Carrinho"><img src="img/icon/cart.png" alt=""> <span>0</span>
                                    <div class="cart__price">Carrinho:</a> <span>R$ 0,00</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="canvas__open"><i class="fa fa-bars"></i></div>
            </div>
        </div>
        <div class="container nav_color">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="header__menu mobile-menu">
                        <ul>
							<li><a href="index.php">Home</a></li>
                           <?php
							  include "admin/includes/conexao.php";
							  $categorias = mysqli_query($conexao,"select * from tb_categorias order by nome");
							  while ($listaCategorias = mysqli_fetch_assoc($categorias)){
								//Verifico se Possui subcategorias para a categoria atual
								  $id_categoria = $listaCategorias["id"];
								  //Faço a consulta para buscar as subcategorias relacionadas a categoria atual
								  $subcategoria = mysqli_query($conexao,"select * from tb_subcategorias where id_categoria = '$id_categoria' order by nome");
								  echo '<li><a href="?categoria='.$id_categoria.'">'.$listaCategorias["nome"].'</a>';
								
								    if (mysqli_num_rows($subcategoria)>0){
									  echo '<ul class="dropdown">' ;
										//Listo as subcategorias, que pertencem a categoria atual
										while ($listaSubcategorias = mysqli_fetch_assoc($subcategoria)){
											echo '<li><a href="?subcategoria='.$listaSubcategorias["id"].'">'.$listaSubcategorias["nome"].'</a></li>';
										}
									  echo '</ul>';
								    }
								  
								  
								 echo '</li>';
								  
							  }
							?>
                           <li><a href="#Contato">Contato</a></li>
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="hero__item set-bg" data-setbg="img/hero/phone.jpg">
                <div class="container">
                </div>
            </div>
            <div class="hero__item set-bg" data-setbg="img/hero/teclado.jpg">
                <div class="container">
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
              
              <?php
				//carregamos os conteudos de acordo com a variavel
				 if (isset($_GET["pg"])){
					switch ($_GET["pg"]){
						case  "VisualizarProduto" :	$incluir = 'visualizaproduto.php'; break;
						case  "NovoCliente"       :	$incluir = 'novoCliente.php'; break;
						case  "Carrinho"          : $incluir = 'carrinho.php'; break;
						default :	$incluir = 'produtos.php';
					}	
					 include($incluir);						
				 }else{
					 include("produtos.php");
				 }
				?>
                           
               
              
                       
            </div>
        </div>
    </section>
    <!-- Product Section End -->

     <!-- Class Section Begin -->
     <section class="class spad cadastro__container" id="Registre">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 cadastro">
                    <div class="class__form">
                        <div class="section-title">
                            <span>Registre-se</span>                            
                        </div>
                        <form action="?pg=NovoCliente" method="post">
                            <input type="text" placeholder="Nome" name="nome" required>
                            <input type="text" placeholder="Email" name="email" required>
                            <input type="password" placeholder="Senha" name="senha" required>
                            <input type="text" placeholder="CPF" name="cpf" required>
                            <input type="text" placeholder="Telefone" name="telefone" required>
                            <input type="text" placeholder="Endereço" name="endereco" required>
                            <input type="text" placeholder="Número" name="numero" required>
                            <input type="text" placeholder="Bairro" name="bairro" required>
                            <input type="text" placeholder="CEP" name="cep" required>
                            <select name="estado">
                            	<option value="SP">SP</option>
                            	<option value="SP">MG</option>
                            </select>
                            <select name="cidade">
                            	<option value="Bebedouro">Bebedouro</option>
                            	<option value="Barretos">Barretos</option>
                            	<option value="Frutal">Frutal</option>
                            </select>
                            <button type="submit" class="site-btn">Confirma</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Class Section End -->
    
     <!-- Class Section Begin -->

    <section class="class spad cadastro__container" id="Login">

        <div class="container">

            <div class="row">

                <div class="col-lg-6 cadastro">

                    <div class="class__form">

                        <div class="section-title">

                            <span>Login</span>



                        </div>

                        <form action="login.php" method="post">

                            <input type="text" placeholder="Email" name="email">

                            <input type="password" placeholder="Senha" name="senha">



                            <div class="lembrar">

                                <input type="checkbox" id="remember-me" name="lembrar">

                                <label class="cursor-pointer" for="remember-me">Lembrar</label>

                                <a href="">Recuperar senha?</a>

                            </div>



                            <button type="submit" class="site-btn">Entrar</button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- Class Section End -->
    
    <!-- Class Section Begin -->
     <section class="class spad cadastro__container" id="Contato">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 cadastro">
                    <div class="class__form">
                        <div class="section-title">
                            <span>Contato</span>
                            
                        </div>
                        <form action="enviaremail.php" method="post">
                            <input type="text" placeholder="Nome" name="nome">
                            <input type="text" placeholder="Email" name="email">
                            <textarea name="mensagem"></textarea>
                            
                            <button type="submit" class="site-btn">Enviar Formulário</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Class Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer set-bg" data-setbg="img/footer-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>Categorias</h6>
                        <ul class="footer__cat">
                           <?php
							   $categorias = mysqli_query($conexao,"select * from tb_categorias order by nome");
							   while ($listaCategorias = mysqli_fetch_assoc($categorias)){
								   echo ' <li><a href="?categoria='.$listaCategorias["id"].'">'.$listaCategorias["nome"].'</a></li>';
							   }
							?>
                   
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="#"><img src="img/logo.webp" alt=""></a>
                        </div>
                        <p>Acompanhe nossas redes sociais e ganhe prêmios participando de sorteios!</p>
                        <div class="footer__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__newslatter">
                        <h6>Newslatter</h6>
                        <p>Fique por dentro das últimas ofertas.</p>
                        <form action="#">
                            <input type="text" placeholder="Email">
                            <button type="submit"><i class="fa fa-send-o"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <p class="copyright__text text-white"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                          Copyright &copy;<script>document.write(new Date().getFullYear());</script>   |   Todos os direitos reservados   |   devStore
                          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                      </p>
                  </div>
                  <div class="col-lg-5">
                    <div class="copyright__widget">
                        <ul>
                            <li><a href="#">Política de Privacidade</a></li>
                            <li><a href="#">Termos & Condições</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Search Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form class="search-model-form" action="?pgPesquisa" method="get">
            <input type="text" name="search-input" id="search-input" placeholder="O que você produra?">            
        </form>
    </div>
</div>
<!-- Search End -->

<!-- Js Plugins -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery.barfiller.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.nicescroll.min.js"></script>
<script src="js/main.js"></script>
    <script>
     $( document ).ready(function() {
			$(".img-outros").click(function(){
				$("#FotoCapa").prop('src',$(this).attr('src'));
			//	alert('Clicou'+$(this).attr('src'));
			})	
		});
     </script>
</body>

</html>