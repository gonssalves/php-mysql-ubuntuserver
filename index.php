<?php include('conexao.php'); ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD LAMP</title>
</head>
<body>
    <h1>Gestão de Usuários</h1>
    
    <form action="criar.php" method="post">
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="email" name="email" placeholder="E-mail" required>
        <button type="submit">Adicionar</button>
    </form>

    <h2>Lista de Usuários</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Criado em</th>
            <th>Ações</th>
        </tr>
        <?php
        $resultado = $conn->query("SELECT * FROM usuarios");
        while ($usuario = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$usuario['id']}</td>";
            echo "<td>{$usuario['nome']}</td>";
            echo "<td>{$usuario['email']}</td>";
            echo "<td>{$usuario['criado_em']}</td>";
            echo "<td>
                <a href='editar.php?id={$usuario['id']}'>Editar</a>
                <a href='excluir.php?id={$usuario['id']}'>Excluir</a>
            </td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
