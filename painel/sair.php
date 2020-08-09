<?php
	//Removendo dados da sessao
	@session_start();
	session_destroy();
	unset($_SESSION);
	header('Location:index.php');
	mysqli_close();
	exit;
?>