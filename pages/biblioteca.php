<?php

session_start();
if (!isset($_SESSION['nome'])) {
    header('Location: login.php');
    exit;
}

require '../php/db.php';

$jogos = $conexao->query("SELECT * FROM jogos ORDER BY nota DESC");
?>


<!DOCTYPE html>
<html lang="pt-br">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    <link rel="stylesheet" href="../css/principal.css">
    <link rel="stylesheet" href="../css/biblioteca.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>
    <nav class="menu-lateral">
        <div class="btn-expandir">
            <i class="bi bi-list" id="btn-exp"></i>
        </div>
        <ul>
            <li class="sidebar_item">
                <a href="principal.php">
                    <span class="sidebar_icon"><i class="bi bi-house-door"></i></span>
                    <span class="sidebar_text">HOME</span>
                </a>
            </li>
            <li class="sidebar_item ativo">
                <a href="biblioteca.php">
                    <span class="sidebar_icon"><i class="bi bi-book"></i></span>
                    <span class="sidebar_text">BIBLIOTECA</span>
                </a>
            </li>
            <li class="sidebar_item">
                <a href="ranking.php">
                    <span class="sidebar_icon"><i class="bi bi-bar-chart-fill"></i></span>
                    <span class="sidebar_text">RANKING</span>
                </a>
            </li>
            <li class="sidebar_item">
                <a href="review.php">
                    <span class="sidebar_icon"><i class="bi bi-chat-left-text-fill"></i></span>
                    <span class="sidebar_text">REVIEW</span>
                </a>
            </li>
            <li class="sidebar_item">
                <a href="#">
                    <span class="sidebar_icon"><i class="bi bi-person-fill"></i></span>
                    <span class="sidebar_text">PERFIL</span>
                </a>
            </li>
        </ul>
    </nav>

    <main class="conteudo-principal">
        <div class="container">

            <div class="topbar">
                <div>
                    <h1>Biblioteca</h1>
                    <p>Catálogo de jogos</p>
                </div>
                <input type="text" id="pesquisa" placeholder="Pesquisar jogo..." onkeyup="pesquisar()">
            </div>

            <div class="dashboard">
                <div class="card-status">
                    <h2>10</h2>
                    <p>Jogos Avaliados</p>
                </div>
                <div class="card-status">
                    <h2>9.4</h2>
                    <p>Média Geral</p>
                </div>
                <div class="card-status">
                    <h2>Elden Ring</h2>
                    <p>Maior Nota</p>
                </div>
            </div>

            <div class="container-games" id="lista-jogos">
                <?php while ($jogo = $jogos->fetch_assoc()): ?>
                <div class="game-card">
                    <img src="<?php echo $jogo['imagem']; ?>" alt="<?php echo $jogo['nome']; ?>">
                    <div class="game-info">
                        <h2><?php echo $jogo['nome']; ?></h2>
                        <div class="nota">⭐ <?php echo $jogo['nota']; ?>/10</div>
                        <p><?php echo $jogo['descricao']; ?></p>
                        <span class="categoria"><?php echo $jogo['categoria']; ?></span>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>

        </div>
    </main>

    <script src="../js/menu_lateral.js"></script>
    <script>
    function pesquisar() {
        const termo = document.getElementById('pesquisa').value.toLowerCase();
        const cards = document.querySelectorAll('.game-card');
        cards.forEach(card => {
            const nome = card.querySelector('h2').textContent.toLowerCase();
            card.style.display = nome.includes(termo) ? 'block' : 'none';
        });
    }
    </script>
</body>
</html>