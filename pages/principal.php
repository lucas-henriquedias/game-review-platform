<?php

session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}

require '../php/db.php';

$jogos_populares = pg_query($conexao, "SELECT * FROM jogos ORDER BY nota DESC LIMIT 6");

$reviews_recentes = pg_query($conexao, "
    SELECT r.*, j.nome AS jogo_nome
    FROM reviews r
    JOIN jogos j ON r.jogo_id = j.id
    ORDER BY r.data_criado DESC
    LIMIT 8
");

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../css/estrutura.css">
    <link rel="stylesheet" href="../css/pages.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>

    <nav class="menu-lateral">
        <div class="btn-expandir">
            <i class="bi bi-list" id="btn-exp"></i>
        </div>

        <ul>
            <li class="sidebar_item ativo">   
                <a href="principal.php">
                    <span class="sidebar_icon"><i class="bi bi-house-door"></i></span>
                    <span class="sidebar_text"> HOME</span>
                </a>
            </li>
            <li class="sidebar_item">   
                <a href="biblioteca.php">
                    <span class="sidebar_icon"><i class="bi bi-book"></i></span>
                    <span class="sidebar_text"> BIBLIOTECA</span>
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
        </ul>
    </nav>

    <main class="conteudo-principal">

        <div class="container-pesquisa">
            <div class="barra-pesquisa">
                <i class="bi bi-search"></i>
                <input type="text" placeholder="Pesquisar jogos...">
            </div>
        </div>

        <section class="secao-home">
            <h2>🔥 Jogos Populares</h2>

            <div class="popular-games">

                <?php while($jogo = pg_fetch_assoc($jogos_populares)): ?>

                    <div class="popular-card">
                        <img src="<?= $jogo['imagem'] ?>" alt="<?= $jogo['nome'] ?>">

                        <div class="popular-info">
                            <h3><?= $jogo['nome'] ?></h3>
                            <span>⭐ <?= $jogo['nota'] ?>/5</span>
                        </div>
                    </div>

                <?php endwhile; ?>

            </div>
        </section>

        <section class="secao-home">
            <h2>📝 Reviews Recentes</h2>

            <div class="reviews-grid">
                <?php while($review = pg_fetch_assoc($reviews_recentes)): ?>
                    <div class="review-card">
                        <h3><?= $review['jogo_nome'] ?></h3>
                        <div class="review-nota">
                            ⭐ <?= $review['nota'] ?>/5
                        </div>
                        <p>
                            <?= $review['comentario'] ?>
                        </p>
                    </div>
                <?php endwhile; ?>
            </div>
        </section>
    </main>
    
    <script src="../js/menu_lateral.js"></script>
</body>
</html>