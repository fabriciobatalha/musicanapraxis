<?php  
	include_once("settings/settings.php");
	@session_start();

	$nome = $_SESSION['nome'];
	$email = $_SESSION['email'];
	$senha = $_SESSION['senha'];

	if(!isset($_SESSION['email']) && !isset($_SESSION['senha'])) 
	{
		header('Location: index.php');
		exit;
	}
?>

<!DOCTYPE html>

<html>

	<head>
		<title> Painel </title>
		<link rel="icon" href="_img/icone.png" type="image/x-icon"/>
		<link rel="icon" href="_img/icone.png" type="image/x-icon"/>
		<link rel="stylesheet" type="text/css" href="_css/master_css.css">
		<link rel="stylesheet" type="text/css" href="_css/bemvindo_css.css">
		<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
	</head>
	
	<body>

		<div id="geral">

			<div id="topo">
				<p> <b> Desenvolvido Por </b> </p>
				<a target="blank" href="http://www.farosys.com"> <img src="_img/farosys.png"> </a>
				<!--<p> Bem vindo, <b><?php echo $nome;?></b> </p>-->
				<input onClick="window.location.href='sair.php'" type="submit" Value="Sair">
			</div>

			<nav id="menuvertical">

				<div class="item">
					<input type="checkbox" id="check1" name="">
					<label id="pino1" for="check1"> <img src="_img/home.png"> Home </label>
					<ul>
						<li> <a id="pino2" href="bemvindo.php"> &nbsp;&nbsp;&nbsp; Bem-Vindo </a> </li>
					</ul>
				</div>

				<div class="item">
					<input type="checkbox" id="check2" name="">
					<label for="check2"> <img src="_img/cadastrar.png"> Cadastrar </label>
					<ul>
						<li> <a href="cadastrar_artigo.php"> &nbsp;&nbsp;&nbsp; Artigos </a> </li>
						<li> <a href="cadastrar_leitura.php"> &nbsp;&nbsp;&nbsp; Leitura </a> </li>
					</ul>
				</div>

				<div class="item">
					<input type="checkbox" id="check3" name="">
					<label for="check3"> <img src="_img/listar.png"> Registros </label>
					<ul>
						<li> <a href="listar_usuario.php"> &nbsp;&nbsp;&nbsp; Usuário </a> </li>
<li> <a href="listar_forum.php"> &nbsp;&nbsp;&nbsp; Fórum </a> </li>
						<li> <a href="listar_artigo.php"> &nbsp;&nbsp;&nbsp; Artigos </a> </li>
						<li> <a href="listar_leitura.php"> &nbsp;&nbsp;&nbsp; Leitura </a> </li>
					</ul>
				</div>

				<div class="item">
					<input type="checkbox" id="check6" name="">
					<label for="check6"> <img src="_img/redessociais.png"> Redes Sociais </label>
					<ul>
						<li> <a href="ver_midia.php"> &nbsp;&nbsp;&nbsp; Visualizar </a> </li>
					</ul>
				</div>
				
			</nav>

			<div align="center" id="conteudo">
				<img src="_img/welcome.png">
			</div>

		</div>

	</body>

</html>