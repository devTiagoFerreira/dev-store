<?php
session_start();
if (isset($_SESSION["logado"])) {
    header("location: admin.php");
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
    <link rel="stylesheet" href="style.css" />
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
                        Perdeu a senha?
                        <br>
                        Solicite para recuperar.
                    </div>
                    <div class="-intro-x mt-5 text-lg text-white">Informe o seu e-mail no campo ao lado para receber as instruções e redefinir sua senha!</div>
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                        Solicite a recuperação de senha!
                    </h2>
                    <form action="?action=req_senha" method="POST">
                        <div class="intro-x mt-8">
                            <input type="text" class="intro-x login__input input input--lg border border-gray-300 block" placeholder="Email" name="email">
                        </div>
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button type="submit" class="button button--lg w-full text-white bg-theme-1 xl:mr-3 button-rec">Solicitar recuperação de senha</button>
                        </div>
                    </form>
                    <div class="-intro-x mt-5 text-lg aviso">
                        <?php
                        if (isset($_GET["action"])) {
                            if ($_GET["action"] == "req_senha") {
                                include("recuperar_senha_action.php");
                            }
                        }
                        ?>
                    </div>
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