<?php  
	include("settings/settings.php");
	@session_start();

	setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	date_default_timezone_set('America/Sao_Paulo');

	$nome = $_SESSION['nome'];
	$email = $_SESSION['email'];
	$senha = $_SESSION['senha'];

	if(!isset($_SESSION['email']) && !isset($_SESSION['senha'])) 
	{
		header('Location: index.php');
		exit;
	}

	if (isset($_GET['excluir'])) {
		mysqli_query(conecta(), "DELETE FROM artigos WHERE id = {$_GET['excluir']}");
		echo "<script>alert('Artigo exclu\u00eddo com sucesso');</script>";
	}

?>

<!DOCTYPE html>

<html>

	<head>
		<title> Painel </title>
		<link rel="icon" href="_img/icone.png" type="image/x-icon"/>
		<link rel="stylesheet" type="text/css" href="_css/master_css.css">
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
					<label id="pino1" for="check3"> <img src="_img/listar.png"> Registros </label>
					<ul>
						<li> <a href="listar_usuario.php"> &nbsp;&nbsp;&nbsp; Usuário </a> </li>
<li> <a href="listar_forum.php"> &nbsp;&nbsp;&nbsp; Fórum </a> </li>
						<li> <a id="pino2" href="listar_artigo.php"> &nbsp;&nbsp;&nbsp; Artigos </a> </li>
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

			<div id="conteudo">
				
				<div id="cabecalho">
					<p> Registros de Artigos </p>
				</div>

				<div id="acoplacampos">

					<table cellpadding="5px" cellspacing="0" ID="alter">

						<tr class="cabecatable">
							<td> <b> Titulo </b> </td>
							<td> <b> Data de Registro </b> </td>
							<td> <b> Editar </b> </td>
							<td> <b> Excluir </b> </td>
						</tr>

						<?php
   							$sql = mysqli_query(conecta(),"select * from artigos");
    						$i = 0;
   							while($vetor=mysqli_fetch_object($sql))
   							{
   								if ($i % 2 == 1) {

									echo "
									<tr class='dif'>
										<td> <a id='link' href='".getURLArtigo($vetor->id)."'> {$vetor->artigo}</a> </td>
										<td> ". date('d/m/Y', strtotime($vetor->data_cad)) ." </td>
										<td> <a href='cadastrar_artigo.php?editar={$vetor->id}'> <img id='imgeditar' src='_img/cadastrar.png'/> </a>
										<td> <a href='listar_artigo.php?excluir={$vetor->id}'> <img id='imgexcluir' src='_img/x.png'/> </a> </td>
									</tr>
									";
								} else {
									echo "
									<tr>
										<td> <a id='link' href='".getURLArtigo($vetor->id)."'> {$vetor->artigo}</a> </td>
										<td> ". date('d/m/Y', strtotime($vetor->data_cad)) ." </td>
										<td> <a href='cadastrar_artigo.php?editar={$vetor->id}'> <img id='imgeditar' src='_img/cadastrar.png'/> </a>
										<td> <a href='listar_artigo.php?excluir={$vetor->id}'> <img id='imgexcluir' src='_img/x.png'/> </a> </td>
									</tr>
									";
								}
								$i++;
   							}
						?>
						
					</table>

				</div>

			</div>

		</div>

	</body>

</html>