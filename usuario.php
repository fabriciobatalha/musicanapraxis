<?php

require 'conn.php';

session_start();



if (isset($_GET['sair'])) {

    session_destroy();

    header("location: https://www.musicanapraxis.com/usuario.php");

}



if (isset($_SESSION['id'])) {

    $usuario = getUsuario($_SESSION['id']);

}



if (isset($_POST['cadastrar'])) {

    if ($_POST['senha'] == $_POST['confSenha']) {

        $sql = "INSERT INTO usuarios(nome,sobrenome,email,senha) VALUES ('{$_POST['nome']}','{$_POST['sobrenome']}','{$_POST['email']}','{$_POST['senha']}')";
		
        if (getConexao()->query($sql)) {
			echo "<script>alert('Cadastro Efetuado');location='usuario.php'</script>";
		} else {
			echo "<script>alert('Não foi possível cadastrar usuário');location='usuario.php'</script>";
		}

    } else {

        echo "<script>alert('Senhas n\u00e3o conferem')</script>";

    }

}

if (isset($_POST['alterar'])) {

    $sql = "UPDATE usuarios SET nome = '{$_POST['nome']}', sobrenome = '{$_POST['sobrenome']}', email = '{$_POST['email']}', senha = '{$_POST['senha']}' WHERE id = {$usuario->id}";

    getConexao()->query($sql);

    echo "<script>alert('Dados alterados');location='usuario.php'</script>";

}

if (isset($_POST['logar'])) {

    $query = getConexao()->prepare("SELECT * FROM usuarios WHERE email = '{$_POST['email']}' AND senha = '{$_POST['senha']}'");

    $query->execute();

    $resultado = $query->fetchObject();



    if ($resultado == null) {

        echo "<script>alert('E-mail ou senha incorretos');location='usuario.php'</script>";

    } else {

        $_SESSION['id'] = $resultado->id;

        header('location: usuario.php');

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

    <link rel="stylesheet" type="text/css" href="css/usuario.css">

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

        <?php if (!isset($_SESSION['id'])): ?>

            <div class="logar">

                <form action="#" method="post">

                    <h1>Logar</h1>

                    <input type="email" name="email" required placeholder="E-mail" value="<?php echo isset($_POST['logar']) ? $_POST['email'] : ''; ?>">

                    <input type="password" name="senha" required placeholder="Senha">

                    <input type="submit" name="logar" value="Logar">

                </form>

            </div>

            <div class="criarConta">

                <form action="#" method="post">

                    <h1>Criar Conta</h1>

                    <input type="text" name="nome" required placeholder="Nome" value="<?php echo isset($_POST['cadastrar']) ? $_POST['nome'] : ''; ?>">

                    <input type="text" name="sobrenome" required placeholder="Sobrenome" value="<?php echo isset($_POST['cadastrar']) ? $_POST['sobrenome'] : ''; ?>">

                    <input type="email" name="email" required placeholder="E-mail" value="<?php echo isset($_POST['cadastrar']) ? $_POST['email'] : ''; ?>">

                    <input type="password" name="senha" required placeholder="Senha">

                    <input type="password" name="confSenha" required placeholder="Confirmar Senha">

                    <input type="submit" name="cadastrar" value="Cadastrar">

                </form>

            </div>

        <?php else: ?>

            <div class="infoUsuario">

                <form action="#" method="post">

                    <label>

                        Nome

                        <input type="text" name="nome" value="<?php echo $usuario->nome; ?>">

                    </label>

                    <label>

                        Sobrenome

                        <input type="text" name="sobrenome" value="<?php echo $usuario->sobrenome; ?>">

                    </label>

                    <label>

                        E-mail

                        <input type="email" name="email" value="<?php echo $usuario->email; ?>">

                    </label>

                    <label>

                        Senha

                        <input type="password" name="senha" value="<?php echo $usuario->senha; ?>">

                    </label>

                    <input type="submit" name="alterar" value="Salvar">

                </form>

            </div>

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

