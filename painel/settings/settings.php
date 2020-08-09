<?php



function conecta() {

	//Dados do servidor

	$host = "mysql669.umbler.com";

	$login = "mnp";

	$senha = "u2wHo[c2r#S{,";

	$banco = "painelmnp";

	return mysqli_connect($host, $login, $senha, $banco);	

}



mysqli_query(conecta(),"SET character_set_connection=utf8");

mysqli_query(conecta(),"SET character_set_client=utf8");

mysqli_query(conecta(),"SET character_set_results=utf8");



function getTopico($id) {

    $query = mysqli_query(conecta(),"SELECT * FROM topicos WHERE id = {$id}");

    

    $resultado = mysqli_fetch_object($query);

    return $resultado;

}



function getSubtopico($id) {

    $query = mysqli_query(conecta(),"SELECT * FROM subtopicos WHERE id = {$id}");

    

    $resultado = mysqli_fetch_object($query);

    return $resultado;

}



function getURLArtigo($artigo_id) {

    $query = mysqli_query(conecta(),"SELECT * FROM artigos WHERE id = {$artigo_id}");

    

    $resultado = mysqli_fetch_object($query);



    $url = "https://www.musicanapraxis.com/"

            .tirarAcentos(utf8_encode(getTopico($resultado->topico_id)->topico))

            ."/"

            .tirarAcentos(utf8_encode(getSubtopico($resultado->subtopico_id)->subtopico))

            ."/artigo.php?artigo=".$resultado->id;



    return formatarURL($url);

}

function getLeituraURL($leitura_id) {
    $url = "https://www.musicanapraxis.com/dicas-de-leitura.php?livro=$leitura_id";

    return formatarURL($url);
}

function getForumURL($forum_id) {
    $url = "https://www.musicanapraxis.com/forum.php?artigo=$forum_id";

    return formatarURL($url);
}

function getURLImagemArtigo($artigo_id) {

    $query = mysqli_query(conecta(),"SELECT * FROM artigos WHERE id = {$artigo_id}");

    

    $resultado = mysqli_fetch_object($query);



    $url = "https://www.musicanapraxis.com/"

            .tirarAcentos(getTopico($resultado->topico_id)->topico)

            ."/"

            .tirarAcentos(getSubtopico($resultado->subtopico_id)->subtopico)

            ."/img/{$resultado->caminho_img}";



    return formatarURL($url);

}


function getUsuario($id) {

    $query = mysqli_query(conecta(),"SELECT * FROM usuarios WHERE id = {$id}");

    

    $resultado = mysqli_fetch_object($query);



    return $resultado;

}



function getForum($id) {

    $query = mysqli_query(conecta(),"SELECT * FROM forum WHERE id = {$id}");

    

    $resultado = mysqli_fetch_object($query);



    return $resultado;

}



function formatarURL($url) {

    $semAcentos = preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $url));

    $urlFormatada = strtolower(str_replace(" ", "-", $semAcentos));



    return $urlFormatada;

}

function tirarAcentos($string){
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(ç)/","/(Ç)/"),explode(" ","a A e E i I o O u U n N c C"),$string);
}