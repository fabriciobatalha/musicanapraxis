<?php

require 'conn.php';

session_start();

?>

<!DOCTYPE html>

<html>

<head>

	<title>M&uacute;sica na Pr&aacute;xis</title>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="css/master.css">

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

			<img src="https://www.musicanapraxis.com/imagens/setting.png" alt="Configura&ccedil;&atilde;o de Usu&aacute;rio">

			<ul>

				<a href="https://www.musicanapraxis.com/usuario.php?usuario=<?php echo $_SESSION['id'] ?>"><li>Configura&ccedil;&otilde;es</li></a>

				<a href="https://www.musicanapraxis.com/usuario.php?sair"><li>Sair</li></a>

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

					<a href="https://www.musicanapraxis.com/index.php">Home</a>

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

				<li><a href="https://www.musicanapraxis.com/dicas-de-leitura.php" id="ativo">Dicas de Leitura</a></li>

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

		<h1>M&uacute;sica e Marxismo</h1>

		<section id="sec_art">

			<h2>&Uacute;ltimos Artigos</h2>

			<div>

				<a href="#" id="art1">

					<article>

						<div class="info_art">

							<h3>Lorem ipsum dolor sit 1.</h3>

							<sub>10 de Dezembro de 2017</sub>

						</div>

					</article>

				</a>

				<a href="#" id="art2">

					<article>

						<div class="info_art">

							<h3>Lorem ipsum dolor sit 2.</h3>

							<sub>10 de Dezembro de 2017</sub>

						</div>

					</article>

				</a>

				<a href="#" id="art3">

					<article>

						<div class="info_art">

							<h3>Lorem ipsum dolor sit 3.</h3>

							<sub>10 de Dezembro de 2017</sub>

						</div>

					</article>

				</a>

			</div>

		</section>

		<section class="art">

			<h2><a href="musica_e_marxismo/relacoes_de_trabalho">Rela&ccedil;&otilde;es de Trabalho</a></h2>

			<div>

				<a href="#" title="Lorem ipsum dolor sit 1.">

					<article>

						<div class="info_art">

							<h3>Lorem ipsum dolor sit 1.</h3>

							<sub>10 de Dezembro de 2017</sub>

						</div>

					</article>

				</a>

				<a href="#" title="Lorem ipsum dolor sit 1.">

					<article>

						<div class="info_art">

							<h3>Lorem ipsum dolor sit 1.</h3>

							<sub>10 de Dezembro de 2017</sub>

						</div>

					</article>

				</a>

				<a href="#" title="Lorem ipsum dolor sit 1.">

					<article>

						<div class="info_art">

							<h3>Lorem ipsum dolor sit 1.</h3>

							<sub>10 de Dezembro de 2017</sub>

						</div>

					</article>

				</a>

				<a href="#">

					<article>

						<div class="info_art">

							<h3>Lorem ipsum dolor sit 2.</h3>

							<sub>10 de Dezembro de 2017</sub>

						</div>

					</article>

				</a>

				<a href="#">

					<article>

						<div class="info_art">

							<h3>Lorem ipsum dolor sit 3.</h3>

							<sub>10 de Dezembro de 2017</sub>

						</div>

					</article>

				</a>

				<a href="#" title="Lorem ipsum dolor sit 1.">

					<article>

						<div class="info_art">

							<h3>Lorem ipsum dolor sit 1.</h3>

							<sub>10 de Dezembro de 2017</sub>

						</div>

					</article>

				</a>

				<a href="#">

					<article>

						<div class="info_art">

							<h3>Lorem ipsum dolor sit 2.</h3>

							<sub>10 de Dezembro de 2017</sub>

						</div>

					</article>

				</a>

				<a href="#">

					<article>

						<div class="info_art">

							<h3>Lorem ipsum dolor sit 3.</h3>

							<sub>10 de Dezembro de 2017</sub>

						</div>

					</article>

				</a>

			</div>

		</section>

		<section class="art">

			<h2><a href="musica_e_marxismo/sindicalismo_na_musica">Sindicalismo na M&uacute;sica</a></h2>

			<div>

				<a href="#" title="Lorem ipsum dolor sit 1.">

					<article>

						<div class="info_art">

							<h3>Lorem ipsum dolor sit 1.</h3>

							<sub>10 de Dezembro de 2017</sub>

						</div>

					</article>

				</a>

				<a href="#" title="Lorem ipsum dolor sit 1.">

					<article>

						<div class="info_art">

							<h3>Lorem ipsum dolor sit 1.</h3>

							<sub>10 de Dezembro de 2017</sub>

						</div>

					</article>

				</a>

				<a href="#" title="Lorem ipsum dolor sit 1.">

					<article>

						<div class="info_art">

							<h3>Lorem ipsum dolor sit 1.</h3>

							<sub>10 de Dezembro de 2017</sub>

						</div>

					</article>

				</a>

				<a href="#">

					<article>

						<div class="info_art">

							<h3>Lorem ipsum dolor sit 2.</h3>

							<sub>10 de Dezembro de 2017</sub>

						</div>

					</article>

				</a>

				<a href="#">

					<article>

						<div class="info_art">

							<h3>Lorem ipsum dolor sit 3.</h3>

							<sub>10 de Dezembro de 2017</sub>

						</div>

					</article>

				</a>

				<a href="#" title="Lorem ipsum dolor sit 1.">

					<article>

						<div class="info_art">

							<h3>Lorem ipsum dolor sit 1.</h3>

							<sub>10 de Dezembro de 2017</sub>

						</div>

					</article>

				</a>

				<a href="#">

					<article>

						<div class="info_art">

							<h3>Lorem ipsum dolor sit 2.</h3>

							<sub>10 de Dezembro de 2017</sub>

						</div>

					</article>

				</a>

				<a href="#">

					<article>

						<div class="info_art">

							<h3>Lorem ipsum dolor sit 3.</h3>

							<sub>10 de Dezembro de 2017</sub>

						</div>

					</article>

				</a>

			</div>

		</section>

	</section>

	<aside>

		<h1>Dica de leitura</h1>

		<img src="imagens/violoncelo.jpg">

		<h2>Lorem ipsum dolor sit 1.</h2>

		<p>

			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod

			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,

			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo

			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse

			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non

			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

		</p>

		<a href="#">Ver</a>

	</aside>

</body>

</html>

