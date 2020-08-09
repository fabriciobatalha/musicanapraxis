<?php

require 'conn.php';

session_start();



if (isset($_GET['sair'])) {

    session_destroy();

    header("location: https://www.musicanapraxis.com/index.php");

}



// Faz com que as datas fiquem em portugues

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

date_default_timezone_set('America/Sao_Paulo');



// Queries dos artigos

$ultArtigos = "SELECT id,artigo,data_cad FROM artigos ORDER BY id DESC LIMIT 3";

$artsMusicaMarxismo = "SELECT id,artigo,data_cad FROM artigos WHERE topico_id = 1 ORDER BY id DESC LIMIT 8";

$artsMusicaPopularErudita = "SELECT id,artigo,data_cad FROM artigos WHERE topico_id = 2 ORDER BY id DESC LIMIT 8";

$artsMusicaAmazonia = "SELECT id,artigo,data_cad FROM artigos WHERE topico_id = 3 ORDER BY id DESC LIMIT 8";

?>

<!DOCTYPE html>

<html>

<head>

	<title>M&uacute;sica na Pr&aacute;xis</title>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="httpss://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="css/master.css">

	<link rel="stylesheet" href="css/index.css">

    <script src="script/master.js" type="text/javascript"></script>

</head>

<body>

	<?php if (!isset($_SESSION['id'])): ?>

		<a href="https://www.musicanapraxis.com/usuario.php" class="contaUsuario">

			<img src="https://www.musicanapraxis.com/imagens/user.png" alt="Usu&aacute;rio">

			<p>Logar</p>

		</a>

	<?php else: ?>

		<div class="contaUsuario logado">

			<img src="https://www.musicanapraxis.com/imagens/setting.png" alt="Configura&ccedil;&atilde;o de Usu&aacute;rio" id="conf">

			<ul>

				<a href="https://www.musicanapraxis.com/usuario.php?usuario=<?php echo $_SESSION['id'] ?>"><li>Configura&ccedil;&otilde;es</li></a>

				<a href="?sair"><li>Sair</li></a>

			</ul>

		</div>

	<?php endif; ?>

    <header>

		<a href="https://www.musicanapraxis.com/index.php">

			<img src="imagens/logo.png" alt="Logo do site">

		</a>

		<nav id="menu">

			<ul>

				<li>

					<a href="https://www.musicanapraxis.com/index.php" id="ativo">Home</a>

				</li>

				<li>

					<a href="https://www.musicanapraxis.com/sobre.php">Sobre</a>

				</li>

				<li class="menu">

					<a href="https://www.musicanapraxis.com/musica-e-marxismo">M&uacute;sica e Marxismo</a>

					<a href="#">M&uacute;sica e Marxismo</a>

					<ul class="submenu">

						<li><a href="https://www.musicanapraxis.com/musica-e-marxismo">Todos</a></li>

						<li><a href="https://www.musicanapraxis.com/musica-e-marxismo/relacoes-de-trabalho">Rela&ccedil;&otilde;es de Trabalho</a></li>

						<li><a href="https://www.musicanapraxis.com/musica-e-marxismo/sindicalismo-na-musica">Sindicalismo na M&uacute;sica</a></li>

					</ul>

				</li>

				<li class="menu">

					<a href="https://www.musicanapraxis.com/musica-popular-e-erudita">M&uacute;sica Popular e Erudita</a>

					<a href="#">M&uacute;sica Popular e Erudita</a>

					<ul class="submenu">

						<li><a href="https://www.musicanapraxis.com/musica-popular-e-erudita">Todos</a></li>

						<li><a href="https://www.musicanapraxis.com/musica-popular-e-erudita/sec-xix-xx-xxi">S&eacute;c XIX, XX, XXI</a></li>

						<li><a href="https://www.musicanapraxis.com/musica-popular-e-erudita/paradigma-nacional-republicano">Paradigma Nacional-Republicano</a></li>

						<li><a href="https://www.musicanapraxis.com/musica-popular-e-erudita/autonomia-musica-e-canone">Autonomia da M&uacute;sica e C&acirc;none</a></li>

					</ul>

				</li>

				<li class="menu">

					<a href="https://www.musicanapraxis.com/musica-na-amazonia">M&uacute;sica na Amaz&ocirc;nia</a>

					<a href="#">M&uacute;sica na Amaz&ocirc;nia</a>

					<ul class="submenu">

						<li><a href="https://www.musicanapraxis.com/musica-na-amazonia">Todos</a></li>

						<li><a href="https://www.musicanapraxis.com/musica-na-amazonia/batuques-amazonicos">Batuques Amaz&ocirc;nicos</a></li>

						<li><a href="https://www.musicanapraxis.com/musica-na-amazonia/carimbo-lambada-guitarrada-e-beiradao">Carimb&oacute;, Lambada, Guitarrada e Beirad&atilde;o</a></li>

						<li><a href="https://www.musicanapraxis.com/musica-na-amazonia/musica-indigena">M&uacute;sica Ind&iacute;gena</a></li>

					</ul>

				</li>

                <li><a href="https://www.musicanapraxis.com/forum.php">F&oacute;rum</a></li>

				<li><a href="https://www.musicanapraxis.com/dicas-de-leitura.php">Dicas de Leitura</a></li>

				<li><a href="https://www.musicanapraxis.com/canal-no-youtube.php">Canal no YouTube</a></li>

			</ul>

			<div id="btmenu" class="btmenu" onclick="hidemenu()">

				<div></div>

				<div></div>

				<div></div>

			</div>

		</nav>

	</header>

	<section>

		<section class="sec_art">

			<h2>&Uacute;ltimos Artigos</h2>

			<div>

				<?php

				foreach (getConexao()->query($ultArtigos) as $row) {

					$data = new DateTime($row['data_cad']);

					$dataFormatada = strftime('%d de %B de %Y', strtotime($row['data_cad']));

					echo "

						<a title='{$row['artigo']}' href='".tirarAcentos(getURLArtigo($row['id']))."' class='arts'>

							<article style='background-image: linear-gradient(rgba(0, 0, 0, 0.85), rgba(0, 0, 0, 0.85)), url(".getURLImagemArtigo($row['id']).");'>

								<div class='info_art'>

									<h3>{$row['artigo']}</h3>

									<sub>{$dataFormatada}</sub>

								</div>

							</article>

						</a>

					";

				}

				?>

			</div>

		</section>

		<h1>T&oacute;picos</h1>

		<section class="art">

			<h2><a href="musica-e-marxismo">M&uacute;sica e Marxismo</a></h2>

			<div>

				<?php

				foreach (getConexao()->query($artsMusicaMarxismo) as $row) {

					$data = new DateTime($row['data_cad']);

					$dataFormatada = strftime('%d de %B de %Y', strtotime($row['data_cad']));

					echo "

						<a href='".getURLArtigo($row['id'])."' title='{$row['artigo']}'>

							<article style='background-image: linear-gradient(rgba(0, 0, 0, 0.85), rgba(0, 0, 0, 0.85)), url(".getURLImagemArtigo($row['id']).");'>

								<div class='info_art'>

									<h3>{$row['artigo']}</h3>

									<sub>{$dataFormatada}</sub>

								</div>

							</article>

						</a>

					";

				}

				?>

			</div>

		</section>

		<section class="art">

			<h2><a href="musica-popular-e-erudita">M&uacute;sica Popular e Erudita</a></h2>

			<div>

				<?php

				foreach (getConexao()->query($artsMusicaPopularErudita) as $row) {

					$data = new DateTime($row['data_cad']);

					$dataFormatada = strftime('%d de %B de %Y', strtotime($row['data_cad']));

					echo "

						<a href='".getURLArtigo($row['id'])."' title='{$row['artigo']}'>

							<article style='background-image: linear-gradient(rgba(0, 0, 0, 0.85), rgba(0, 0, 0, 0.85)), url(".getURLImagemArtigo($row['id']).");'>

								<div class='info_art'>

									<h3>{$row['artigo']}</h3>

									<sub>{$dataFormatada}</sub>

								</div>

							</article>

						</a>

					";

				}

				?>

			</div>

		</section>

		<section class="art">

			<h2><a href="musica-na-amazonia">M&uacute;sica na Amaz&ocirc;nia</a></h2>

			<div>

				<?php

				foreach (getConexao()->query($artsMusicaAmazonia) as $row) {

					$data = new DateTime($row['data_cad']);

					$dataFormatada = strftime('%d de %B de %Y', strtotime($row['data_cad']));

					echo "

						<a href='".getURLArtigo($row['id'])."' title='{$row['artigo']}'>

							<article style='background-image: linear-gradient(rgba(0, 0, 0, 0.85), rgba(0, 0, 0, 0.85)), url(".getURLImagemArtigo($row['id']).");'>

								<div class='info_art'>

									<h3>{$row['artigo']}</h3>

									<sub>{$dataFormatada}</sub>

								</div>

							</article>

						</a>

					";

				}

				?>

			</div>

		</section>

	</section>

	<?php

	$leitura = getConexao()->prepare("SELECT id,livro,textodescricao,link_livro,nome_img FROM livros ORDER BY id DESC");

	$leitura->execute();

	$resultadoLeitura = $leitura->fetchObject();

	if ($resultadoLeitura != null) {

	?>

	<aside>

		<h1>Dica de leitura</h1>

		<img src="https://www.musicanapraxis.com/imagens/livros/<?php echo $resultadoLeitura->nome_img; ?>">

		<h2><?php echo $resultadoLeitura->livro; ?></h2>

		<p>

			<?php echo $resultadoLeitura->textodescricao; ?>

		</p>

		<a href="https://www.musicanapraxis.com/dicas-de-leitura.php?livro=<?php echo $resultadoLeitura->id; ?>">Ver</a>

	</aside>

	<?php

	}

	?>

</body>

</html>

