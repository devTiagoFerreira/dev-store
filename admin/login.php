<?php
if (!isset($_POST["email"]) && !isset($_POST["senha"])) {
    $email = "";
    $senha = "";
} else {
    $email = $_POST["email"];
    $senha = $_POST["senha"];
}

if (trim($email) == '') {
    echo "E-mail não informado!";
    exit();
}
if (trim($senha) == '') {
    echo "Senha não informada!";
    exit();
}

include("includes/conexao.php");

$query_auth = mysqli_query($conexao, "select * from tb_usuarios where email = '$email' and senha = md5('$senha')");

if (mysqli_num_rows($query_auth) > 0) {
    $_SESSION["logado"] = mysqli_fetch_assoc($query_auth);
    echo '<meta http-equiv="refresh" content="0; URL=\'admin.php\'"/>';
} else {
    echo "Usuário e senha inválidos!";
}
