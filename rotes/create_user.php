<?php
include '../conf.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$nome = $_POST['name'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "INSERT INTO user (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

if ($conn->query($sql) === TRUE){
    echo "Novo registro criado com sucesso";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();
?>

<form method="post" action="">
    Nome: <input type="text" name="name" required>
    Email: <input type="email" name="email" required>
    SENHA: <input type="senha" name="senha" required>
    <input type="submit" value="Adicionar">
</form>









