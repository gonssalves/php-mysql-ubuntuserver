<?php
include('conexao.php');

$nome = $_POST['nome'];
$email = $_POST['email'];

$conn->query("INSERT INTO usuarios (nome, email) VALUES ('$nome', '$email')");
header('Location: index.php');
?>
