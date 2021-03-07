<?php
  $email = $_POST["email"];
  $senha = $_POST["senha"];
echo "<br />";  
 if (trim($email)==''){
	echo '<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-6 text-white"> <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>Favor Informe um email!</div>';
	 exit();
 }
if (trim($senha)==''){
	echo '<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-6 text-white"> <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>Favor Informe a senha!</div>';
	 exit();
 }


include("includes/conexao.php");
$qryValidaLogin = mysqli_query($conexao, "select * from tb_usuarios where email = '$email' and senha = md5('$senha')");

if (mysqli_num_rows($qryValidaLogin)>0){
	$_SESSION["logado"] = mysqli_fetch_assoc($qryValidaLogin);
	echo '<meta http-equiv="refresh" content="0; URL=\'admin.php\'"/>';
}else{
	echo '<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-6 text-white"> <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>Usuário e/ou senha inválidos!</div>';
}


?>