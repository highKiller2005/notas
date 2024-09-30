<?php 
require_once "../db.php";

$id = $POST['id'];
$title = $POST['title'];
$content = $POST['content'];
$category = $POST['category'];

$query = "UPDATE FROM notas SET titulo = '$title', conteudo = '$content', categoria = '$category',  WHERE id = '$id'";

$conn->query($query);