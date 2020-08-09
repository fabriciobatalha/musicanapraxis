<?php

require "conn.php";

header("Content-Type: application/json");

//if (isset($_POST['topico_id'])) {
    $subtopico = getConexao()->query("SELECT * FROM subtopicos WHERE topico_id = {$_GET['topico_id']}");
    $i = 0;
    while ($row = $subtopico->fetch(PDO::FETCH_OBJ)) {
        $sub[$i] = $row;
        $i++;
    }

    echo json_encode($sub);
//}
