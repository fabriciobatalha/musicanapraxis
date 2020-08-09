<?php

require 'conn.php';

session_start();



if (isset($_GET['sair'])) {

    session_destroy();

    header("location: https://www.musicanapraxis.com/sobre.php");

}

// Faz com que as datas fiquem em portugues

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

date_default_timezone_set('America/Sao_Paulo');

?>

<!DOCTYPE html>

<html>

<head>

	<title>M&uacute;sica na Pr&aacute;xis</title>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="httpss://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="css/master.css">

	<link rel="stylesheet" type="text/css" href="css/sobre.css">

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

					<a href="https://www.musicanapraxis.com/sobre.php" id="ativo">Sobre</a>

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

                <li><a href="https://www.musicanapraxis.com/sobre.php">F&oacute;rum</a></li>

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
		<h1>Sobre</h1>
		<h2>MANIFESTO MÚSICA NA PRAXIS</h2>

		<p> Qual é o ser social do músico na sociedade capitalista atual? Quais são as dimensões da vida social impactadas pela sua prática? O músico é um trabalhador? A condição do músico e de suas práticas na sociedade capitalista contemporânea ainda é nebulosa na compreensão geral. A música na prática social possui uma dimensão centrada na produção da vida material através do intercâmbio com a natureza realizado pelo trabalho humano. Ao contrário da visão dominante na sociedade burguesa, afirmamos que a dimensão do trabalho é fundamental para entender a música dentro da sociedade capitalista e por isso as relações de trabalho do músico devem ser consideradas nas reflexões sobre as práticas musicais.  </p>
		<p> O Brasil experimentou o crescimento do capitalismo industrial moderno entre as décadas de 1930 e 1980 e neste processo social a música brasileira vêm se modernizando numa dinâmica de constantes transformações contraditórias. A história da música brasileira no último século desenrola-se através do desenvolvimento do capitalismo brasileiro, apesar disto, a escassez ou quase inexistência de estudos demonstram que o processo de modernização do Samba e do Carimbó, por exemplo, nunca foi abordado pelo prisma das relações de trabalho capitalistas que implicaram.    </p>
		<p> Neste sentido, é inconveniente constatar que na atual estrutura institucional de pesquisa e ensino de música no Brasil existe uma negligência sobre a prática musical dentro das relações de trabalho no mercado musical capitalista. Quem procurar a dimensão do trabalho nos anais dos congressos das maiores associações de pesquisa em música no Brasil, será surpreendido com um vazio constrangedor, apesar da grande importância social da questão. É frustrante constatar que esse assunto é, salve iniciativas pontuais, quase que inteiramente invisível nos centros de investigação musical no Brasil. O descaso desta estrutura herdada dos anos anteriores faz parte de uma tendência geral de incisivo aumento da exploração capitalista e contínua precarização das relações de trabalho.  </p>
		<p> Este contraste nos coloca diante de um fenômeno curioso, que pode ser tido como sintomático das tendências político-ideológicas predominantes no campo da música. Diferente das predominantes abordagens culturalistas e estudos fragmentados, a totalidade dialética permanece indispensável para compreensão das práticas musicais dentro do capitalismo periférico brasileiro. A música dos grupos religiosos, das comunidades indígenas e quilombolas, a música e todas múltiplas inter-relações devem se articular numa noção de totalidade para a compreensão do movimento em que as práticas musicais se encontram dentro da sociedade. </p>
		<p> Hoje no Brasil, a pesquisa em música, numa exacerbada antropologização, acentua as dimensões culturais, simbólicas, identitárias, micro-sociais, vetores que parecem gozar de exclusividade na atenção dispensada às práticas investigadas. Um sintoma bastante significativo disto é que, não tendo espaço no atual quadro institucional de pesquisa em música, diversos estudos sobre as relações de trabalho dos músicos têm surgido em áreas como geografia, ciências sociais, educação, saúde, psicologia.  </p>
		<p> Em 2020 realizamos um levantamento bibliográfico acerca do tema das relações de trabalho dos músicos. A amostragem total tem 41 itens entre artigos, capítulos de livros, dissertações e teses. Estes trabalhos foram publicados em programas de pós-graduação e revistas entre 2001 e 2019. Entre estas 41 pesquisas apenas 17 foram publicados em meios científicos ligados a instituições e associações de música. Portanto, diante do total de publicações levantadas, 41% das publicações surgiram no campo institucional da pesquisa em música enquanto que 59% das publicações sobre o tema pertencem a áreas exteriores ao campo específico da pesquisa em música. </p>
		<p> Apesar desta contradição por que pesquisar a música e as relações de trabalho é fundamental para os trabalhadores? A crise de 2008 aprofundou o poder do capital financeiro. O aumento da exploração capitalista contra a classe trabalhadora é uma das marcas incontornáveis de nosso tempo e é neste contexto de precarização estrutural do trabalho que músicos e artistas estão profundamente inseridos. Sempre vulneráveis e expostos aos riscos do trabalho instável e inseguro, o músico padece e se resigna diante de sua situação de agonia que é sua condição. </p>
		<p> Hoje no Brasil, dormirão milhares de trabalhadores desempregados e no desalento, entre estes milhares de homens e mulheres negras e pobres da periferia.  Este cenário inclui 9 milhões de sub-empregos, bicos, trabalho temporário, informal e terceirizado. O sistema político trabalha para salvar o lucro da burguesia financeira-imperialista à custa da exploração dos trabalhadores músicos. A ofensiva burguesa contra o povo brasileiro expressa o acirramento da luta de classes dentro do país.  A dilapidação dos direitos sociais com os ataques e cortes de recursos aos serviços públicos. Uma guerra de classes assola a sociedade brasileira. </p>
		<p> A ideologia da autonomia da música, criada no seio do romantismo alemão do século XIX, oculta a autopercepção do músico como um sujeito de classe.  No início do século XIX, a noção de autonomia da música implicou na categoria de obra musical, criou a noção de música absoluta e solidificou um cânone de música “séria” em contraposição da música popular, chamada de “ligeira”. A noção de música séria atribuída ao erudito e ligeira ao popular esconde as noções hierárquicas da sociedade capitalista. A música erudita é considerada séria porque é uma obra de arte permanente, produção de grande valor estético que atravessará os tempos. A música popular é chamada de ligeira porque é destinada para o mercado de entretenimento popular, produção de baixo valor, já que ficará confinada em um tempo específico, o tempo do consumo. Desde o início do século XIX, a música popular urbana é desqualificada pela ideologia da autonomia da música. Essa ideologia justifica a resistência em investigar o mercado musical, seu desenvolvimentos e contradições, as relações de trabalho que constituem o trabalho musical.  </p>
		<p> O nacionalismo musical brasileiro, ao mesmo tempo em que valorizou a cultura popular, através de representações idealizadas do ambiente rural brasileiro, rejeitou o experimentalismo e a música popular de mercado, própria do ambiente urbano-industrial em contraditória expansão a partir dos anos 30. Considerando que o nacionalismo brasileiro, ao longo do século XX, absorveu essa concepção anti-dialética dentro do processo de construção das instituições de música, compreendemos a hostilidade permanente do pensamento musical brasileiro em relação ao desenvolvimento urbano dinâmico da música popular.  </p>
		<p> A nossa herança escravocrata presente na formação do capitalismo brasileiro cobre o trabalho manual com todo sentido negativo. A atividade musical perdeu prestígio pois é uma atividade “braçal” realizada por trabalhadores negros-escravos em hora de folga e lazer, suas festas, procissões e encontros. Até hoje é perceptível como os músicos são desvalorizados por trabalharem durante o horário em que os outros trabalhadores estão de folga. Dentro da ideologia capitalista esse vínculo entre a imagem do ócio ao trabalho manual mostra o trabalho do músico como negativo.   </p>
		<p> Mesmo que não sejam trabalhadores proletários da indústria, dentro da sociedade capitalista contemporânea, a maior parte dos músicos faz parte da classe trabalhadora pequeno-burguesa pobre. Os músicos satisfazem as necessidades da fantasia, do desejo, da imaginação, do sensorial e instintivo e apesar do manto ideológico do “trabalho flexível”, “autônomo”, dentro da divisão social do trabalho, os músicos possuem trabalhos próximos ao conjunto de trabalhadores pobres da sociedade.   </p>
		<p> As novas formas de trabalho musical no capitalismo financeiro precisam ser compreendidas a partir da visão da classe trabalhadora. Ao ocultar esse debate contribui-se apenas para que os músicos entrem sem o menor senso de realidade no mercado de trabalho deste segmento e tenham todas as dificuldades em lutar por melhores condições. </p>
		<p>  A crise do mercado musical capitalista significa o aumento da exploração de milhares de trabalhadores músicos dentro de suas relações de trabalho. A crítica direcionada a indústria capitalista da arte deve ir além da reclamação de mal gosto do trabalhador. É necessário denunciar das formas exploratórias que compõem o trabalho do músico na sociedade capitalista atual, um contexto marcado pela diminuição de público, fechamento e redução de orquestras, corais, bandas e outras formações instrumentais. Estes acontecimentos dramáticos colocam os trabalhadores músicos diante de um enorme desafio.                                                                                                                               </p>
		<p> O discurso do empreendedorismo musical surgiu como uma das soluções mais promissoras, uma ideologia sedutora como forma de resposta eficaz para a crise do mercado capitalista. O empreendedorismo foi visto como uma alternativa para a crise, um caminho potencialmente renovador em substituição as formas “arcaicas” e “ultrapassadas” como os sindicatos de orquestras. Os projetos musicais passaram a ser avaliados por sua “inovação” e “flexibilidade”.  </p>
		<p> Atualmente, a condição do músico dentro do mercado é coberta pela ideologia do empreendedorismo, que apresenta o músico como um empresário de si mesmo, um agente atomizado, que age de forma profissional, técnica. Essa visão dominante apenas transfere a precariedade das instituições aos indivíduos. As abordagens que afirmam o músico como empreendedor também negligenciam a consciência de classe necessária para a organização política da categoria dos músicos no capitalismo financeiro.  </p>
		<p> Tal como o conceito de economia criativa, a onda do empreendedorismo musical é uma forma de expansão da ideologia neoliberal dentro da produção artística por isso não pode ser visto como um caminho de emancipação para os trabalhadores músicos e nem uma forma livre de construir uma carreira, mas sim como uma forma de disciplinar os músicos para o trabalho precário e inseguro coberto por uma retórica de patrocínio institucional. </p>
		<p> Por fim, acreditamos que a música possui uma dimensão política evidente assim como os músicos possuem um potencial político-organizativo que precisa se desenvolver a partir de uma visão de conjunto. Sindicatos, associações, movimentos populares e culturais cumprirão um papel importante na luta contra a burguesia em nosso tempo. Os desafios impostos pela atual tendência de acirramento da luta de classes permitem caminhar na construção de novas formas de organização política dos músicos, que podem se reconhecer como integrantes da classe trabalhadora em antagonismo com o capital.  </p>
		<br>
		<br>
		<br>
		<p> Bernardo Mesquita </p>
		<p> Breno Ampáro </p>
		<p> Everaldo Barbosa </p>
		<p> Guilherme Nardi </p>
		<p> Hudson Lima </p>
		<p> Luciana Requião </p>
		<p> Marco Tuma </p>
		<p> Marcelo Rosa </p>
		<p> Tiago Breves de Oliveira </p>
		<p> Valmir  Martins </p>
		<p> Vinícius Camargo </p>
		<p> Vera Pape  </p>

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

