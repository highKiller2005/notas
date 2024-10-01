<?php
include '../conf.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$titulo = $_POST['titulo'];
$conteudo = $_POST['conteudo'];
$categoria = $_POST['categoria'];
$criado_em = $_POST['criado_em'];

$sql = "INSERT INTO notas (titulo, conteudo, categoria, criado_em) VALUES ('$titulo', '$conteudo', '$categoria', $criado_em)";

if ($conn->query($sql) === TRUE){
    echo "Novo registro criado com sucesso";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();
?>

<form method="post" action="">
    TITULO: <input type="titulo" name="titulo" required>
    CONTEUDO: <input type="conteudo" name="conteudo" required>
    CATEGORIA: <input type="categoria" name="categoria" required>
    CRIADO_EM:  <input type="criado_em" name="criado_em" required>
    <input type="submit" value="Adicionar">
</form>