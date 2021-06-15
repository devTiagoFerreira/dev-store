<?php
 session_start();
 unset($_SESSION["clienteLogado"]);
 header("Location: index.php");
?>