<?php 
require_once "../db.php";

$id = $POST['id'];
$query = "DELETE FROM notas WHERE id = '$id'";

$conn->query($query);
