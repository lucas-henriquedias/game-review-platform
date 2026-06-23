<?php
//session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require '../php/db.php';

    $nome     = $_POST['nome'];
    $usuario  = $_POST['usuario'];
    $email    = $_POST['email'];
    $senha    = $_POST['senha'];
    $dataNasc = $_POST['dataNascimento'];

    $result = pg_query_params(
        $conexao, 
        "INSERT INTO usuarios (nome, usuario, email, senha, dataNasc) VALUES ($1, $2, $3, $4, $5)",
        [$nome, $usuario, $email, $senha, $dataNasc]
    );

    if ($result) {
        header('Location: login.php');
        exit;
    } else {
        $erro = "Erro! Usuário ou email já existe!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Registrar-se</title>
    <link rel="stylesheet" href="../css/estrutura.css">
    <link rel="stylesheet" href="../css/pages.css">
</head>
<body>
    <div class="box">
        <form action="cadastro.php" method="POST">
            <fieldset>
                <legend><b>Registrar-se</b></legend>
                <br><br>
                <?php if (isset($erro)) echo "<script>alert('$erro');</script>"; ?>

                <div class="inputbox">                
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome Completo</label>
                </div>
                <br><br>

                <div class="inputbox">                
                    <input type="text" name="usuario" id="usuario" class="inputUser" required>
                    <label for="usuario" class="labelInput">Nome de Usuário</label>
                </div>
                <br><br>

                <div class="inputbox">                
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>

                <div class="inputbox">                
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <br><br>

                <div class="inputbox">                
                    <label for="dataNascimento"><b>Data de Nascimento</b></label>    
                    <input type="date" name="dataNascimento" id="dataNascimento" class="inputUser" required>
                </div>
                <br><br>

                <input type="submit" name="submit" id="submit" value="Registrar-se">
            </fieldset>
        </form>
    </div>
    
</body>
</html>