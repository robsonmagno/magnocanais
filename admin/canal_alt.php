<?php
include "../inc/include.php";
/*
$sql = "DELETE FROM canais WHERE can_id=5";
$result = pg_query($pg_con, $sql);
die();
*/
$sql = "SELECT MAX(can_id) FROM canais";
$result = pg_query($pg_con, $sql);
$dados = pg_fetch_row($result);
$max_id = $dados[0]+1;

$retorno = array('status'=>"falha");

$id = (int)$_POST['i'];
$num = (int)$_POST['can_num'];
$nom = str_replace("'","´", $_POST['can_nom']);
$url = str_replace("'","´", $_POST['can_url']);

if($id==0){
    if($num!="" && $num!="" && $url!="")
    {
        $sql = "INSERT INTO canais (can_id,can_num, can_nom, can_url) VALUES ($max_id,$num, '$nom', '$url')";
        pg_query($pg_con, $sql);
        $retorno['status'] = 'ok';
    }
}else{

}

echo json_encode($retorno);
?>