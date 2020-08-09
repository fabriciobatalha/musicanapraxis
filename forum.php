<?php

require 'conn.php';

session_start();



if (isset($_GET['sair'])) {

    session_destroy();

    header("location: https://www.musicanapraxis.com/forum.php");

}



if (isset($_POST['comentar']) && isset($_SESSION['id'])) {

    if ($_POST['comentario'] == "") {

        echo "<script>alert('Preencha os campos');location='forum.php?artigo={$_GET['artigo']}'</script>";

        exit();

    }

    $sql = "INSERT INTO comentarios(id_artigo_forum,comentario,id_usuario) VALUES ({$_GET['artigo']},'{$_POST['comentario']}',{$_SESSION['id']})";

    if (getConexao()->query($sql)) {
		echo "<script>alert('Coment\u00e1rio Enviado');location='forum.php?artigo={$_GET['artigo']}'</script>";
	}
}



// Faz com que as datas fiquem em portugues

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

date_default_timezone_set('America/Sao_Paulo');



if (isset($_GET['campo']) && isset($_GET['valor'])) {

    $forum = "SELECT * FROM forum WHERE {$_GET['campo']} LIKE '%{$_GET['valor']}%'";

} else {

    $forum = "SELECT * FROM forum";

}



if (isset($_GET['criarArtigo'])) {

    $sql = "INSERT INTO forum(titulo,id_usuario,textodescricao) VALUES ('{$_GET['titulo']}',{$_SESSION['id']},'{$_GET['descricao']}')";

    if (getConexao()->query($sql)) {
		echo "<script>alert('Cadastro Efetuado');location='forum.php'</script>";
	} else {
		echo "<script>alert('Não foi possível cadastrar artigo');location='forum.php'</script>";
	}


}

?>

<!DOCTYPE html>

<html>

<head>

	<title>M&uacute;sica na Pr&aacute;xis</title>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="httpss://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="css/master.css">

	<link rel="stylesheet" type="text/css" href="css/forum.css">

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

                <li><a href="https://www.musicanapraxis.com/forum.php" id="ativo">F&oacute;rum</a></li>

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

		<?php

		if (!isset($_GET['artigo']) && !isset($_GET['criar'])) {

			echo "

            <h1>F&oacute;rum</h1>

            <form class='filtro' action='#' method='get'>

                <label>

                    Pesquisar por:

                    <select name='campo'>

                        <option selected value='titulo'>T&iacute;tulo</option>

                        <option value='descricao'>Descri&ccedil;&atilde;o</option>

                    </select>

                </label>

                <input type='text' name='valor'/>

				<input type='submit' value='Pesquisar' />

			</form>

			<div class='createarticle filtro'>
				<script>
					function createArticle() {
						window.location.href = 'https://www.musicanapraxis.com/forum.php?criar';
					}
				</script>
				<input type='button' onclick='createArticle()' value='Criar artigo'/>
			</div>

            ";

			foreach (getConexao()->query($forum) as $row) {

				$data = new DateTime($row['data_cad']);

				$dataFormatada = strftime('%d/%m/%Y', strtotime($row['data_cad']));

				echo "

					<article class='artForum'>

						<a href='?artigo={$row['id']}'>

							<div>

								<h2>{$row['titulo']}</h2>

								<p>

									".substr($row['descricao'], 0, 255)."...

								</p>

							</div>

						</a>

						<div class='usuario'>

							<div>

								<p>".getUsuario($row['id_usuario'])->nome." ".getUsuario($row['id_usuario'])->sobrenome."</p>

								<p><sub>{$dataFormatada}</sub></p>

							</div>

						</div>

					</article>

				";

			}

		} else if (isset($_GET['artigo']) && !isset($_GET['criar'])) {

			$forum = getForum($_GET['artigo']);

			$comentario = "SELECT * FROM comentarios WHERE id_forum = {$_GET['artigo']}";

			$data = new DateTime($forum->data_cad);

			$dataFormatada = strftime('%d/%m/%Y', strtotime($forum->data_cad));

			echo "

				<article class='artForum'>

					<p>

						{$forum->textodescricao}

					</p>

					<div class='usuario'>

						<div>

							<p>".getUsuario($forum->id_usuario)->nome." ".getUsuario($forum->id_usuario)->sobrenome."</p>

							<p><sub>{$dataFormatada}</sub></p>

						</div>

					</div>

				</article>

			";

		?>

		<section class='comentarios'>

			<h2>Coment&aacute;rios</h2>

			<?php

            $comentarios = "SELECT * FROM comentarios WHERE id_artigo_forum=$_GET[artigo]";

			foreach (getConexao()->query($comentarios) as $row) {

				$data = new DateTime($row['data_cad']);

				$dataFormatada = strftime('%d/%m/%Y', strtotime($row['data_cad']));

				echo "

					<article class='artForum'>

						<p>

							{$row['comentario']}

						</p>

						<div class='usuario'>

							<div>

								<p>".getUsuario($row['id_usuario'])->nome." ".getUsuario($row['id_usuario'])->sobrenome."</p>

								<p><sub>{$dataFormatada}</sub></p>

							</div>

						</div>

					</article>

				";

			}

			?>

		</section>

		<?php

    }

		?>



        <?php if (isset($_SESSION['id']) && isset($_GET['artigo'])): ?>

            <form class="comentario" action="#" method="post">

                <textarea name="comentario" rows="2" placeholder="Coment&aacute;rio" required></textarea>

                <input type="submit" name="comentar" value="Comentar">

            </form>

        <?php endif; ?>



        <?php if (isset($_GET['criar']) && isset($_SESSION['id'])): ?>

            <h1>Criar Artigo</h1>

            <form class="criarArtigoForum" action="#" method="get">

                <input type="text" name="titulo" placeholder="T&iacute;tulo">

                <textarea name="descricao" rows="2" placeholder="Descri&ccedil;&atilde;o"></textarea>

                <input type="submit" name="criarArtigo" value="Criar">

            </form>

        <?php endif; ?>

        <?php if (isset($_GET['criar']) && !isset($_SESSION['id'])): ?>

            <p>Voc&ecirc; precisa estar <a href="https://www.musicanapraxis.com/usuario.php" class="link">logado</a>   </p>

        <?php endif; ?>

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

