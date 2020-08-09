<?php  

	require("settings/settings.php");

	if (isset($_GET['topico_id'])) {

	    // Retorna subtopicos filtrados por topico

	    header("Content-Type: application/json");

	    $subtopico = mysqli_query(conecta(),"SELECT * FROM subtopicos WHERE topico_id = {$_GET['topico_id']}");

	    $i = 0;

	    while ($row = mysqli_fetch_object($subtopico)) {

	        $sub[$i]['id'] = $row->id;
	        $sub[$i]['topico_id'] = $row->topico_id;
	        $sub[$i]['subtopico'] = $row->subtopico;

	        $i++;

	    }

	    echo json_encode($sub);

	    exit();

	}

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

		$sql = "SELECT * FROM artigos WHERE id = {$_GET['editar']}";

		$query = mysqli_query(conecta(), $sql);

		$artigo = mysqli_fetch_object($query);

	}



	if (isset($_POST['salvar']) && isset($_GET['editar'])) {

		$sql = "UPDATE artigos SET artigo = '{$_POST['artigo']}', textoartigo = '{$_POST['textoartigo']}', topico_id = {$_POST['topico']}, subtopico_id = {$_POST['subtopico']} WHERE id = {$_GET['editar']}";

		try {

			mysqli_query(conecta(), $sql);

			echo "<script>alert('Salvo');location='listar_artigo.php'</script>";

			//header('location: cadastrar_leitura.php');

		} catch (Exception $e) {

			echo "<script>alert('Falha ao alterar dados');location='cadastrar_artigo.php'</script>";

		}

	}



	$topicos = mysqli_query(conecta(), "SELECT * FROM topicos");



?>



<!DOCTYPE html>



<html>



	<head>

		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<title> Painel </title>

		<link rel="icon" href="_img/icone.png" type="image/x-icon"/>

		<link rel="stylesheet" type="text/css" href="_css/master_css.css">

		<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
		
		<link rel="stylesheet" href="https://www.musicanapraxis.com/painel/jQuery-TE_v.1.4.0/jquery-te-1.4.0.css">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		
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

						<li> <a id="pino2" href="cadastrar_artigo.php"> &nbsp;&nbsp;&nbsp; Artigos </a> </li>

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



			<div id="conteudo">

				

				<div id="cabecalho">

					<p> Dados </p>

				</div>



				<form id="acoplacampos" action="#" method="POST" enctype="multipart/form-data">



					<div>

						<p> Título </p>

						<input type="text" name="artigo" id="titulo" required value="<?php echo isset($artigo) != null ? $artigo->artigo : '' ?>">

					</div>



					<?php if (!isset($_GET['editar'])): ?>

						<div>

							<p> Imagem do Artigo </p>

							<input type="file" name="imgArtigo" id="imagem">

						</div>

					<?php endif ?>



					<div>

						<p> Tópico </p>

						<select class="combobox1" id="selectTopico" name="topico" onchange="changedTop(this)">

							<option selected <?php echo isset($artigo) != null ? "value='".getTopico($artigo->topico_id)->id."'" : 'disabled' ?> > <?php echo isset($artigo) != null ? getTopico($artigo->topico_id)->topico : 'Selecione o tópico' ?> </option>

							<?php

								while($row = mysqli_fetch_object($topicos)) {

									echo "<option value='{$row->id}'>".utf8_encode($row->topico)."</option>";

								}

							?>

						</select>

					</div>



					<div>

						<p> SubTópico </p>
						<select class="combobox1" id="subtopicos" name="subtopico">
							<option disabled selected value="0"> Selecione o subtópico </option>
							<?php
							$sql = mysqli_query(conecta(), "select * from subtopicos");
		
							while($vetor=mysqli_fetch_array($sql))
							{
								echo "<option disabled value='$vetor[id]'>".utf8_encode($vetor[subtopico])."</option>";
							}
							?>
						</select>
						<!--<select class="combobox1" id="subtopico" name="subtopico">

							<option selected <?php echo isset($artigo) != null ? "value='".getSubTopico($artigo->subtopico_id)->id."'" : 'disabled' ?> > <?php echo isset($artigo) != null ? getSubtopico($artigo->subtopico_id)->subtopico : 'Selecione o tópico' ?> </option>

							<script type="text/javascript">

			                    $("#selectTopico").on('change', () => {

			                        $.get('cadastrar_artigo.php?topico_id='+$("#selectTopico").val(), (subtopico) => {

			                            $("#subtopico").html("");

			                            for (var i = 0; i < subtopico.length; i++) {

			                                $("#subtopico").append("<option value=" + subtopico[i].id + ">" + subtopico[i].subtopico + "</option>");

			                            }

			                        }, 'JSON');

			                    });

			                </script>

						</select>-->

					</div>



					<div class="artigotextbox">

						<p> Artigo </p>

						<textarea name="textoartigo" id="textoartigo"><?php echo isset($artigo) != null ? $artigo->textoartigo : '' ?></textarea>
                        
                        <script>
                            $('#textoartigo').jqte();
                        </script>
					</div>



					<div>

						<input type="submit" class="cadbutton" name="<?php echo isset($artigo) != null ? 'salvar' : 'cadastrar' ?>" value="<?php echo isset($artigo) != null ? 'Salvar' : 'Cadastrar' ?>">

					</div>



				</form>



				<?php  

					if(isset($_POST['cadastrar']))

					{

						$titulo = $_POST['artigo'];

						$textoartigo = $_POST['textoartigo'];



						if(empty($titulo) || empty($textoartigo))

						{

							echo"<script language='javascript' type='text/javascript'>alert('Preencha todos os campos!');window.location.href='cadastrar_artigo.php';</script>";

								exit();

						}

							else

							{



								date_default_timezone_set("Brazil/East"); //Definindo timezone padrão

							    $ext = strtolower(substr($_FILES['imgArtigo']['name'],-4)); //Pegando extensão do arquivo

							    $nome_img = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo

								$ciFormatada = tirarAcentos("../".utf8_encode(getTopico($_POST['topico'])->topico)."/".utf8_encode(getSubtopico($_POST['subtopico'])->subtopico)."/");
								
							    $caminho_img = strtolower(str_replace(" ", "-", $ciFormatada));

							    $dir = str_replace(",", "", $caminho_img) . "img/"; //Diretório para uploads

							    move_uploaded_file($_FILES['imgArtigo']['tmp_name'], $dir.$nome_img); //Fazer upload do arquivo



							    $sql = "INSERT INTO artigos(artigo,caminho_img,textoartigo,topico_id,subtopico_id)

										VALUES ('{$_POST['artigo']}','{$nome_img}', '{$_POST['textoartigo']}', '{$_POST['topico']}', '{$_POST['subtopico']}')";
								if(mysqli_query(conecta(),$sql))

								{

									echo"<script language='javascript' type='text/javascript'>alert('Artigo cadastrado com sucesso!');window.location.href='listar_artigo.php';</script>";

								exit();

								}

									else

									{

										echo"<script language='javascript' type='text/javascript'>alert('Erro ao cadastrar! Contate um administrador!');window.location.href='index.php';</script>";

								exit();

									}

							}

					}



				?>



			</div>



		</div>



	</body>


	<script async>
		var subtopicos = document.getElementById("subtopicos");
		function changedTop(element) {

			if (element.value == 1) {
				// TODO show subtopics 'Relações de Trabalho(id 1)', 'Sindicalismo na Música(id 2)'
				for (let i=0;i <= 8;i++) {
					if (i == 1 || i == 2) {
						subtopicos[i].hidden = false;
						subtopicos[i].disabled = false;
					} else {
						subtopicos[i].hidden = true;
					}
				}
			}

			if (element.value == 2) {
				// TODO show subtopics 'Séc XIX, XX, XXI(id 3)', 'Paradigma Nacional-Republicano(id 4)', 'Autonomia Música e Cânone(id 5)'
				for (let i=0;i <= 8;i++) {
					if (i == 3 || i == 4 || i == 5) {
						subtopicos[i].hidden = false;
						subtopicos[i].disabled = false;
					} else {
						subtopicos[i].hidden = true;
					} 
				}
			}

			if (element.value == 3) {
				// TODO show subtopic 'Batuques Amazônicos(id 6)', 'Carimbó, Lambada, Guitarrada e Beiradão(id 7)', 'Música Indígena(id 8)'
				for (let i=0;i <= 8;i++) {
					if (i == 6 || i == 7 || i == 8) {
						subtopicos[i].hidden = false;
						subtopicos[i].disabled = false;
					} else {
						subtopicos[i].hidden = true;
					}
				}
			}

			subtopicos.value = 0;
		}
	</script>
</html>