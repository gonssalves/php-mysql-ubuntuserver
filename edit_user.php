<?php
include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    
    $conn->query("UPDATE usuarios SET nome='$nome', email='$email' WHERE id=$id");
    header('Location: index.php');
} else {
    $id = $_GET['id'];
    $resultado = $conn->query("SELECT * FROM usuarios WHERE id=$id");
    $usuario = $resultado->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
</head>
<body>
    <h1>Editar Usuário</h1>
    <form action="editar.php" method="post">
        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
        <input type="text" name="nome" value="<?php echo $usuario['nome']; ?>" required>
        <input type="email" name="email" value="<?php echo $usuario['email']; ?>" required>
        <button type="submit">Salvar Alterações</button>
    </form>
</body>
</html>
