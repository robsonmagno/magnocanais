<?php
include "../inc/include.php";

$sql = "SELECT can_id, can_num, can_nom, can_url FROM canais WHERE can_id=".$_GET['i'];
$result = pg_query($pg_con, $sql);
$dados = pg_fetch_row($result);

$retorno = array(
    'can_id'=>$dados[0],
    'can_num'=>$dados[1],
    'can_nom'=>$dados[2],
    'can_url'=>$dados[3]
);

echo json_encode($retorno);
?>