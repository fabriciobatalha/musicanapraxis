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

	if (isset($_GET['editar'])) {
		$sql = "SELECT * FROM livros WHERE id = {$_GET['editar']}";
		$query = mysqli_query(conecta(), $sql);
		$livro = mysqli_fetch_object($query);
	}

	if (isset($_POST['salvar']) && isset($_GET['editar'])) {
		$sql = "UPDATE livros SET livro = '{$_POST['livro']}', textodescricao = '{$_POST['textodescricao']}', link_livro = '{$_POST['linklivro']}' WHERE id = {$_GET['editar']}";

		try {
			mysqli_query(conecta(), $sql);
			echo "<script>alert('Salvo');location='listar_leitura.php'</script>";
			//header('location: cadastrar_leitura.php');
		} catch (Exception $e) {
			echo "<script>alert('Falha ao alterar dados');location='cadastrar_leitura.php'</script>";
		}
	}
?>

<!DOCTYPE html>

<html>

	<head>
		<title> Painel </title>
		<link rel="icon" href="_img/icone.png" type="image/x-icon"/>
		<link rel="stylesheet" type="text/css" href="_css/master_css.css">
		<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
		<link rel="stylesheet" href="https://www.musicanapraxis.com/painel/jQuery-TE_v.1.4.0/jquery-te-1.4.0.css">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://www.musicanapraxis.com/painel/jQuery-TE_v.1.4.0/jquery-te-1.4.0.min.js"></script>
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
					<label id="pino1" for="check2"> <img src="_img/cadastrar.png"> Cadastrar </label>
					<ul>
						<li> <a href="cadastrar_artigo.php"> &nbsp;&nbsp;&nbsp; Artigos </a> </li>
						<li> <a id="pino2" href="cadastrar_leitura.php"> &nbsp;&nbsp;&nbsp; Leitura </a> </li>
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

			<div id="conteudo">
				
				<div id="cabecalho">
					<p> Dados </p>
				</div>

				<form id="acoplacampos" action="" method="POST" enctype="multipart/form-data">

					<div>
						<p> Livro </p>
						<input type="text" name="livro" id="livro" value="<?php echo isset($livro) != null ? $livro->livro : ''?>">
					</div>

					<?php if (!isset($_GET['editar'])): ?>
						<div>
							<p> Imagem do Livro </p>
							<input type="file" name="imgLivro" id="imagemlivro">
						</div>
					<?php endif ?>

					<div>
						<p> Link do Livro </p>
						<input type="text" name="linklivro" id="linklivro" value="<?php echo isset($livro) != null ? $livro->link_livro : ''?>">
					</div>

					<div class="descricaotextbox">
						<p> Descricao </p>
						<textarea name="textodescricao" id="textodescricao"><?php echo isset($livro) != null ? $livro->textodescricao : ''?></textarea>
						<script>
						    $('#textodescricao').jqte();
						</script>
					</div>

					<div>
						<input type="submit" class="cadbutton" name="<?php echo isset($livro) != null ? 'salvar' : 'cadastrar'?>" value="<?php echo isset($livro) != null ? 'Salvar' : 'Cadastrar'?>">
					</div>

				</form>

				<?php  
					if(isset($_POST['cadastrar']))
					{
						$livro = $_POST['livro'];
						$linklivro = $_POST['linklivro'];
						$textodescricao = $_POST['textodescricao'];

						if(empty($livro) || empty($linklivro) || empty($textodescricao))
						{
							echo"<script language='javascript' type='text/javascript'>alert('Preencha todos os campos!');window.location.href='cadastrar_leitura.php';</script>";
								exit();
						}
							else
							{
								date_default_timezone_set("Brazil/East"); //Definindo timezone padrão
							    $ext = strtolower(substr($_FILES['imgLivro']['name'],-4)); //Pegando extensão do arquivo
							    $nome_img = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
							    //$ciFormatada = preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', "../imagens/"));
								$ciFormatada = tirarAcentos("../imagens/");
							    $caminho_img = strtolower(str_replace(" ", "-", $ciFormatada));
							    $dir = $caminho_img . "livros/"; //Diretório para uploads
							    move_uploaded_file($_FILES['imgLivro']['tmp_name'], $dir.$nome_img); //Fazer upload do arquivo

								$cadastrar = "INSERT INTO livros (livro,textodescricao,nome_img,link_livro) VALUES ('{$_POST['livro']}','{$_POST['textodescricao']}','{$nome_img}','{$_POST['linklivro']}')";
								if(mysqli_query(conecta(),$cadastrar))
								{
									echo"<script language='javascript' type='text/javascript'>alert('Leitura cadastrada com sucesso!');window.location.href='listar_leitura.php';</script>";
								exit();
								}
									else
									{
										echo"<script language='javascript' type='text/javascript'>alert('Erro ao cadastrar! Contate um administrador.!');window.location.href='index.php';</script>";
								exit();
									}
							}
					}
				?>

			</div>

		</div>

	</body>

</html>