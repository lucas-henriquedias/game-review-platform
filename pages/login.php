<?php 

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'C:/xampp/htdocs/game-review-platform/php/db.php';

    $usuario = $_POST['usuario'];
    $senha   = $_POST['senha'];

    $result = $conexao->query("SELECT * FROM usuarios 
    WHERE usuario='$usuario' AND senha='$senha'");

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['nome'] = $user['nome'];
        header('Location: ');   //<-- Aqui tem q entrar o nome do arquivo php da página principal do site.
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
    <link rel="stylesheet" href="../css/login.css">
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