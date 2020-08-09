<?php



function getConexao() {

    try {

      $conn = new PDO("mysql:host=mysql669.umbler.com;dbname=painelmnp", "mnp", "u2wHo[c2r#S{,");

      // Para corrigir problemas com acentuacao

      $conn->query("SET character_set_connection=utf8");

      $conn->query("SET character_set_client=utf8");

      $conn->query("SET character_set_results=utf8");

    } catch (Exception $e) {

      exit($e->getMessage());

    }



    return $conn;

}

function getTopico($id) {

    $query = getConexao()->prepare("SELECT * FROM topicos WHERE id = {$id}");

    $query->execute();

    $resultado = $query->fetchObject();

    return $resultado;

}



function getSubtopico($id) {

    $query = getConexao()->prepare("SELECT * FROM subtopicos WHERE id = {$id}");

    $query->execute();

    $resultado = $query->fetchObject();

    return $resultado;

}



function getURLArtigo($artigo_id) {

    $query = getConexao()->prepare("SELECT * FROM artigos WHERE id = {$artigo_id}");

    $query->execute();

    $resultado = $query->fetchObject();





    $url = "https://www.musicanapraxis.com/"

            .tirarAcentos(getTopico($resultado->topico_id)->topico)

            ."/"

            .tirarAcentos(str_replace(",", "", getSubtopico($resultado->subtopico_id)->subtopico))

            ."/artigo.php?artigo=".$resultado->id;



    return formatarURL($url);

}



function getURLImagemArtigo($artigo_id) {

    $query = getConexao()->prepare("SELECT * FROM artigos WHERE id = {$artigo_id}");

    $query->execute();

    $resultado = $query->fetchObject();



    $url = "https://www.musicanapraxis.com/"

            .tirarAcentos(getTopico($resultado->topico_id)->topico)

            ."/"

            .tirarAcentos(str_replace(",", "", getSubtopico($resultado->subtopico_id)->subtopico))

            ."/img/{$resultado->caminho_img}";



    return formatarURL($url);

}



// function getUsuario($id) {

//     $query = getConexao()->prepare("SELECT * FROM usuarios WHERE id = {$id}");

//     $query->execute();

//     $resultado = $query->fetchObject();



//     return $resultado;

// }



// function getForum($id) {

//     $query = getConexao()->prepare("SELECT * FROM forum WHERE id = {$id}");

//     $query->execute();

//     $resultado = $query->fetchObject();



//     return $resultado;

// }



// function getArtigo($id) {

//     $query = getConexao()->prepare("SELECT * FROM artigos WHERE id = {$id}");

//     $query->execute();

//     $resultado = $query->fetchObject();



//     return $resultado;

// }

// function getLivro($id) {

//     $query = getConexao()->prepare("SELECT * FROM livros WHERE id = {$id}");

//     $query->execute();

//     $resultado = $query->fetchObject();



//     return $resultado;

// }

function formatarURL($url) {

    //$semAcentos = preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $url));
	
	$semAcentos = tirarAcentos($url);

    $urlFormatada = strtolower(str_replace(" ", "-", $semAcentos));


    return $urlFormatada;

}

function tirarAcentos($string){
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(ç)/","/(Ç)/"),explode(" ","a A e E i I o O u U n N c C"),$string);
}

getConexao();


//// MYSQLI SECTION

function conecta() {

	//Dados do servidor

	$host = "mysql669.umbler.com";

	$login = "mnp";

	$senha = "u2wHo[c2r#S{,";

	$banco = "painelmnp";

	return mysqli_connect($host, $login, $senha, $banco);	

}

function getArtigo($id) {
    $query = mysqli_query(conecta(),"SELECT * FROM artigos WHERE id = {$id}");

    

    $resultado = mysqli_fetch_object($query);

    return $resultado;

}

function getLivro($id) {
    $query = mysqli_query(conecta(),"SELECT * FROM livros WHERE id = {$id}");

    

    $resultado = mysqli_fetch_object($query);

    return $resultado;

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