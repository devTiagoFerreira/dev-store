<?php
  session_start();
  if (isset($_SESSION["logado"])){
	 header("Location: admin.php");
  }


  include("includes/conexao.php");
  $usuarioesenha = '';

  $qryusuarios = mysqli_query($conexao, "select * from tb_usuarios limit 2");
  if (mysqli_num_rows($qryusuarios) == 0){
	$insere = mysqli_query($conexao, "insert into tb_usuarios VALUES (0, 'Administrador', 'admin@etec.com', md5('123') )"); 
	 $usuarioesenha = 'Usuario Padrão: admin@etec.com Senha: 123'; 
  }
  
  
  if (mysqli_num_rows($qryusuarios) == 1){
	  $usuariopadrao = mysqli_fetch_array($qryusuarios);
	  if ($usuariopadrao["email"] == 'admin@etec.com'){
		 $usuarioesenha = 'Usuario Padrão: admin@etec.com Senha: 123'; 
	  }
  }
  

?>
<!DOCTYPE html>
<!--
Template Name: Midone - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="dist/images/logo.svg" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Midone admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="LEFT4CODE">
        <title>Administração da loja Virtual</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="dist/css/app.css" />
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="login">
        <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                <!-- BEGIN: Login Info -->
                <div class="hidden xl:flex flex-col min-h-screen">
                    <a href="" class="-intro-x flex items-center pt-5">
                        <img alt="Loja Virtual" style="width: 300px;" src="imgs/logo.png">
                        
                    </a>
                    <div class="my-auto">
                        <img alt="Midone Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="dist/images/illustration.svg">
                        <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                            Sua loja 
                            <br>
                            Acesse para gerenciar.
                        </div>
                        <div class="-intro-x mt-5 text-lg text-white">Gerencie os produtos, categorias e vendas da sua loja</div>
                    </div>
                </div>
                <!-- END: Login Info -->
                <!-- BEGIN: Login Form -->
               
                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                    <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                            Entrar
                        </h2>
                        
                         <form method="post" action="?acao=Logar" >
                        <div class="intro-x mt-8">
                            <input type="text" class="intro-x login__input input input--lg border border-gray-300 block" placeholder="Email" id="email" name="email">
                            <input type="password" class="intro-x login__input input input--lg border border-gray-300 block mt-4" placeholder="Senha" id="senha" name="senha">
                        </div>
                        <div class="intro-x flex text-gray-700 text-xs sm:text-sm mt-4">
                            <div class="flex items-center mr-auto">
                                <input type="checkbox" class="input border mr-2" id="remember-me">
                                <label class="cursor-pointer select-none" for="remember-me">Lembrar</label>
                            </div>
                            <a href="recupera_senha.php">Recuperar senha?</a> 
                        </div>
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button type="submit" class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3">Acessar</button>
                            <?php echo $usuarioesenha;			
							?>
                        </div>
                         <?php if (isset($_GET["acao"])){
								include("login.php");
							}
							?>
                       </form>
                    </div>
                </div>
               
                <!-- END: Login Form -->
            </div>
        </div>
        <!-- BEGIN: JS Assets-->
        <script src="dist/js/app.js"></script>
        <!-- END: JS Assets-->
    </body>
</html>