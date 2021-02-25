<?php
    include('includes/conexao.php');
    $usuario_e_senha = "";
    $query_usuarios = mysqli_query($conexao, "select * from tb_usuarios limit 2");

    if (mysqli_num_rows($query_usuarios) == 0) {
        $insere = mysqli_query($conexao, "insert into tb_usuarios values (0, 'admin', 'admin@etec.com.br', md5('123'))");
        $usuario_e_senha = "<strong>Usuário padrão:</strong>    admin@etec.com.br    <strong>Senha:</strong>   123";
    }

    if (mysqli_num_rows($query_usuarios) == 1) {
        $usuario_padrao = mysqli_fetch_array($query_usuarios);
        if ($usuario_padrao["email"] == "admin@etec.com.br") {
            $usuario_e_senha = "<strong>Usuário padrão:</strong>    admin@etec.com.br    <strong>Senha:</strong>   123";
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
        <link href="images/logo_devStore.ico" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Administração da Loja Virtual</title>
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
                        <img alt="devStore" class="w-6" src="images/logo_devStore.webp" style="width:40px;">
                        <span class="text-white text-lg ml-3"> dev<span class="font-medium">Store</span> </span>
                    </a>
                    <div class="my-auto">
                        <img alt="Midone Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="dist/images/illustration.svg">
                        <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                            Sua loja 
                            <br>
                            Acesse para gerenciar.
                        </div>
                        <div class="-intro-x mt-5 text-lg text-white">Gerencie produtos, categorias e vendas da sua loja</div>
                        <div class="-intro-x mt-5 text-lg text-white"><?php echo $usuario_e_senha ?></div>
                    </div>
                </div>
                <!-- END: Login Info -->
                <!-- BEGIN: Login Form -->
                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                    <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                            Entrar
                        </h2>
                        <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">Gerencie produtos, categorias e vendas da sua loja</div>
                        <div class="intro-x mt-2 text-gray-500 xl:hidden text-center"><?php echo $usuario_e_senha ?></div>
                        <form action="login.php" method="post">
                        <div class="intro-x mt-8">
                            <input type="text" class="intro-x login__input input input--lg border border-gray-300 block" placeholder="Email" name="email">
                            <input type="password" class="intro-x login__input input input--lg border border-gray-300 block mt-4" placeholder="Senha" name="senha">
                        </div>
                        <div class="intro-x flex text-gray-700 text-xs sm:text-sm mt-4">
                            <div class="flex items-center mr-auto">
                                <input type="checkbox" class="input border mr-2" id="remember-me">
                                <label class="cursor-pointer select-none" for="remember-me">Lembrar-me</label>
                            </div>
                            <a href="">Esqueceu a senha?</a> 
                        </div>
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button type="submit" class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3">Acessar</button>
                        </div>
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