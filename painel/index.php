<?php 

	require("settings/settings.php");

	@session_start();



	if(isset($_SESSION['email']) && isset($_SESSION['senha']))

	{

		header('Location: bemvindo.php');

		exit;

		//echo "Estou logado";

	}

?>



<!DOCTYPE html>



<html>



	<head>

		<title> Login </title>

		<link rel="icon" href="_img/icone.png" type="image/x-icon"/>

		<link rel="stylesheet" type="text/css" href="_css/index_css.css">

		<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">

		<meta name="viewport" content="width=device-width, initial-scale=1" />

	</head>



	<body>



		<div id="geral">



			<form id="formulario" action="" method="POST" enctype="multipart/form-data">

				<img src="_img/perfil.png">

				<input type="email" name="email" id="email" maxlength="30" placeholder="E-mail">

				<input type="password" maxlength="15" name="senha" id="senha" placeholder="Senha">

				<input type="hidden" name="entrar" value="Login">

				<!--<p> Bem vindo, <b><?php echo $nome;?></b> </p>-->

				<button> <b> Logar </b> </button>



				<!--Apenas para teste-->



				<!--<a href="bemvindo.php"> Ir Para Painel </a>-->



			</form>



		</div>



		<?php  

			if(isset($_POST['entrar']) && ($_POST['entrar']))

			{

				//$nome = $_POST['nome'];

				$email = $_POST['email'];

				$senha = $_POST['senha'];

				//echo "Cliquei!";



				if (empty($email) || empty($senha)) 

				{

					echo"<script language='javascript' type='text/javascript'>alert('Preencha todos os campos!');window.location.href='index.php';</script>";

								exit();

				}



					else

					{

						$query = "SELECT nome, email, senha FROM adm WHERE email='{$email}' AND senha='{$senha}'";

						$result = mysqli_query(conecta(),$query);

						$busca = mysqli_num_rows($result);

						$linha = mysqli_fetch_object($result);



						if($busca > 0)

						{

							$_SESSION['nome'] = $linha->nome;

							$_SESSION['email'] = $linha->email;

							$_SESSION['senha'] = $linha->senha;

							//header('Location: bemvindo.php');

							echo"<script language='javascript' type='text/javascript'>alert('Logado com sucesso!');window.location.href='bemvindo.php';</script>";

							exit();

						}

							else

							{

								echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos!');window.location.href='index.php';</script>";

								exit();

							}

					}

			}

		?>



	</body>

</html>