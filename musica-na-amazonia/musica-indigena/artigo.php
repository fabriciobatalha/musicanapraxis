<?php

require '../../conn.php';

session_start();



if (isset($_GET['sair'])) {

    session_destroy();

    header("location: https://www.musicanapraxis.com/musica-na-amazonia/musica-indigena/artigo.php");

}



if (!isset($_GET['artigo'])) {

    header('location: index.php');

}

?>

<!DOCTYPE html>

<html>

<head>

	<title>M&uacute;sica na Pr&aacute;xis</title>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="https://www.musicanapraxis.com/css/master.css">

    <link rel="stylesheet" type="text/css" href="https://www.musicanapraxis.com/css/artigo.css">

	<script src="https://www.musicanapraxis.com/script/master.js" type="text/javascript"></script>

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

		<a href="index.php">

			<img src="https://www.musicanapraxis.com/imagens/logo.png" alt="Logo do site">

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

					<a href="https://www.musicanapraxis.com/musica-na-amazonia" id="ativo">M&uacute;sica na Amaz&ocirc;nia</a>

					<a href="#">M&uacute;sica na Amaz&ocirc;nia</a>

					<ul class="submenu">

						<li><a href="https://www.musicanapraxis.com/musica-na-amazonia">Todos</a></li>

						<li><a href="https://www.musicanapraxis.com/musica-na-amazonia/batuques-amazonicos">Batuques Amaz&ocirc;nicos</a></li>

						<li><a href="https://www.musicanapraxis.com/musica-na-amazonia/carimbo-lambada-guitarrada-e-beiradao">Carimb&oacute;, Lambada, Guitarrada e Beirad&atilde;o</a></li>

						<li><a href="https://www.musicanapraxis.com/musica-na-amazonia/musica-indigena" class="subativo">M&uacute;sica Ind&iacute;gena</a></li>

					</ul>

				</li>

				<li><a href="https://www.musicanapraxis.com/forum.php">F&oacute;rum</a></li>

				<li><a href="https://www.musicanapraxis.com/dicas-de-leitura.php">Dicas de Leitura</a></li>

				<li><a href="https://www.musicanapraxis.com/https.php">Canal no YouTube</a></li>

			</ul>

			<div id="btmenu" class="btmenu" onclick="hidemenu()">

				<div></div>

				<div></div>

				<div></div>

			</div>

		</nav>

	</header>

	<section>

        <div class="breadcumb">

            <p><a href="https://www.musicanapraxis.com/musica-na-amazonia">M&uacute;sica na Amaz&ocirc;nia</a> > <a href="https://www.musicanapraxis.com/musica-na-amazonia/musica-indigena/">M&uacute;sica Ind&iacute;gena</a> > <a href="#" class="subativo"><?php echo getArtigo($_GET['artigo'])->artigo ?></a> </p>

        </div>

        <article>

            <h1><?php echo getArtigo($_GET['artigo'])->artigo ?></h1>

            <img src="<?php echo getURLImagemArtigo($_GET['artigo']) ?>" alt="">

            <p><?php echo getArtigo($_GET['artigo'])->textoartigo ?></p>

        </article>

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

		<a href="<?php echo $resultadoLeitura->link_livro; ?>">Ver</a>

	</aside>

	<?php

	}

	?>

</body>

</html>

