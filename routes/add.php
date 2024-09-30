<?php 
require_once "../config.php";
$db = new Database();

$query = "INSERT INTO notas (titulo, conteudo, categoria) VALUES ('Novo', 'conteudo', 'pendente')";

$db->query($query);

$notas = $db->get_many('notas');
echo json_encode($notas);

$db->close();    

die();