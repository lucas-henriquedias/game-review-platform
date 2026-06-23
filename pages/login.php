<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require '../php/db.php';

    $usuario = $_POST['usuario'];
    $senha   = $_POST['senha'];

    $result = pg_query_params(
        $conexao,
        "SELECT * FROM usuarios WHERE usuario = $1 AND senha = $2",
        [$usuario, $senha]
    );

    if (pg_num_rows($result) > 0) {
        $user = pg_fetch_assoc($result);
        $_SESSION['usuario_id'] = $user['id'];
        $_SESSION['nome'] = $user['nome'];
        header('Location: principal.php');
        exit;
    } else {
        $erro = "Usuário ou senha incorretos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <link rel="stylesheet" href="../css/estrutura.css">
    <link rel="stylesheet" href="../css/pages.css">
</head>

<body>
    <div class="login">
        <h1>Login</h1>
        <?php if (isset($erro)) echo "<script>alert('$erro');</script>"; ?>

        <form action="login.php" method="POST">
            <input type="text" name="usuario" placeholder="Nome de Usuário">
            <br><br>
            
            <input type="password" name="senha" placeholder="Senha">
            <br><br>
            <button type="submit">Entrar</button>
        </form>

        <a href="cadastro.php">
            <button>Registrar-se</button>
        </a>
    </div>
</body>
</html>