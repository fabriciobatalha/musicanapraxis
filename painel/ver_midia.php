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
		<link rel="stylesheet" type="text/css" href="_css/master_css.css">
		<link rel="stylesheet" type="text/css" href="_css/ver_midia_css.css">
		<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<div id="fb-root"></div>
		<script>(function(d, s, id) 
		{
  			var js, fjs = d.getElementsByTagName(s)[0];
  			if (d.getElementById(id)) return;
  			js = d.createElement(s); js.id = id;
  			js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.11';
  			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
		</script>
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
					<label for="check1"> <img src="_img/home.png"> Home </label>
					<ul>
						<li> <a href="bemvindo.php"> &nbsp;&nbsp;&nbsp; Bem-Vindo </a> </li>
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
					<label  id="pino1" for="check6"> <img src="_img/redessociais.png"> Redes Sociais </label>
					<ul>
						<li> <a id="pino2" href="ver_midia.php"> &nbsp;&nbsp;&nbsp; Visualizar </a> </li>
					</ul>
				</div>
				
			</nav>

			<div align="center" id="conteudo">
				
				<div id="redes">	
			
					<div class="fb-page" data-href="https://www.facebook.com/grupofarosys" data-tabs="timeline" data-width="300" data-height="500" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote></div>
					
					<img src="_img/insta.png">

					<a class="twitter-timeline" href="https://twitter.com/grupofarosys?ref_src=twsrc%5Etfw" data-width="300" data-height="500">Tweets by grupofarosys</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

				</div>

			</div>

		</div>

	</body>

</html>