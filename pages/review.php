<?php
session_start();
if (!isset($_SESSION['nome'])) {
    header('Location: login.php');
    exit;
}

require '../php/db.php';

// Salva nova review
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jogo      = $_POST['jogo'];
    $nota      = $_POST['nota'];
    $comentario = $_POST['comentario'];
    $usuario_id = $_SESSION['usuario_id'];

    $conexao->query("INSERT INTO reviews (usuario_id, jogo, nota, comentario)
                     VALUES ('$usuario_id', '$jogo', '$nota', '$comentario')");
}

// Busca todas as reviews
$reviews = $conexao->query("
    SELECT r.jogo, r.nota, r.comentario, u.usuario, r.data_criado
    FROM reviews r
    JOIN usuarios u ON r.usuario_id = u.id
    ORDER BY r.data_criado DESC
");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
    <link rel="stylesheet" href="../css/principal.css">
    <link rel="stylesheet" href="../css/review.css">
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
            <li class="sidebar_item">
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
            <li class="sidebar_item ativo">
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

    <div class="conteudo-principal">
        <div class="container">
            <header>
                <h1>Portal de Reviews</h1>
            </header>

            <main class="main-content">
                <div class="game-cover">
                    <img src="https://images.unsplash.com/photo-1511512578047-dfb367046420?q=80&w=1000" alt="Capa do Jogo">
                </div>

                <div class="review-form-container">
                    <h2>Deixe sua opinião</h2>
                    <form action="review.php" method="POST">
                        <input type="text" name="jogo" placeholder="Nome do jogo" required>

                        <select name="nota" required>
                            <option value="" disabled selected>Sua nota</option>
                            <option value="5">⭐⭐⭐⭐⭐ (5/5)</option>
                            <option value="4">⭐⭐⭐⭐ (4/5)</option>
                            <option value="3">⭐⭐⭐ (3/5)</option>
                            <option value="2">⭐⭐ (2/5)</option>
                            <option value="1">⭐ (1/5)</option>
                        </select>

                        <textarea name="comentario" placeholder="O que você achou do jogo?..." required></textarea>

                        <button type="submit">Publicar Review</button>
                    </form>
                </div>
            </main>

            <section class="reviews-section">
                <h2>Reviews da Comunidade</h2>
                <div class="review-list">
                    <?php while ($review = $reviews->fetch_assoc()): ?>
                    <div class="review-card">
                        <div class="review-header">
                            <span class="reviewer-name"><?php echo $review['usuario']; ?> — <?php echo $review['jogo']; ?></span>
                            <span class="review-rating"><?php echo str_repeat('⭐', $review['nota']); ?></span>
                        </div>
                        <p class="review-text"><?php echo $review['comentario']; ?></p>
                    </div>
                    <?php endwhile; ?>
                </div>
            </section>
        </div>
    </div>

    <script src="../js/menu_lateral.js"></script>
</body>
</html>