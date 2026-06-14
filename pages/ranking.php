<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Ranking</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
            <li class="sidebar_item ativo">
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
        <div class="w-full max-w-3xl p-8 mx-auto">
           <h1 class="text-4xl font-bold text-center mb-10 text-sky-400">RANKING</h1>
            <div id="lista-jogos"></div>
        </div>
    </main>

    <div id="modalJogo" class="modal fixed inset-0 bg-black/80 justify-center items-center" onclick="fecharModal(event)">
        <div class="bg-slate-900 p-6 rounded-2xl w-[400px] relative">
            <button class="absolute top-4 right-4 text-2xl text-slate-400 hover:text-white z-10 bg-slate-900/80 rounded-full w-8 h-8 flex items-center justify-center border border-slate-700/50" onclick="document.getElementById('modalJogo').classList.remove('ativo')">&times;</button>
            <img id="modalCapa" class="rounded-xl mb-4">
            <h2 id="modalNomeJogo" class="text-2xl font-bold"></h2>
            <p id="modalNotaJogo" class="text-amber-400 mb-3 font-bold"></p>
            <p id="modalComentario" class="bg-slate-950/50 p-3 rounded-lg border border-slate-800"></p>
            <p id="modalDicas" class="mt-3 bg-emerald-950/30 p-3 rounded-lg border border-emerald-800/50 text-emerald-400"></p>
        </div>
    </div>

    <script src="../js/menu_lateral.js"></script>
    <script src="../js/ranking.js"></script>
</body>
</html>
