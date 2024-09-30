<?php 
require_once "../config.php";
$db = new Database();

if (assert_key_exists(['id', 'title', 'content', 'category'], $_POST)) {
    $query = "UPDATE notas SET titulo = '$title', conteudo = '$content', categoria = '$category' WHERE id = '$id'";

    $db->query($query);
} else {
    $db->close();    
    header("500 Internal Server Error");
    die();
}

$notas = $db->get_many('notas');
echo json_encode($notas);
$db->close();    
