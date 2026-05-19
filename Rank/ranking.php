<?php
/**conectar dados.php  */
include("dados.php");

/**Verifica se tem uma lista de avaliações  */
if (isset($avaliacoes) && is_array($avaliacoes)) {
    arsort($avaliacoes);
} else {
    $avaliacoes = [];
}
$detalhes_jogos = [
    "BioShock" => [
    "capa" => "https://cdn.cloudflare.steamstatic.com/steam/apps/8870/header.jpg", // link da capa
    "comentario" => "Um FPS incrível com uma história profunda e ambientação única na cidade subaquática de Rapture.",
    "locais" => ["Steam", "Epic Games Store", "PlayStation Store"],
    "caracteristicas" => [
        "FPS", 
        "Terror", 
        "Ficção Científica", 
        "História Profunda", 
        "Single Player", 
        "Atmosfera Sombria", 
        "Ação", 
        "Narrativo"
    ],
    "dicas" => "Explore cada canto de Rapture para encontrar plasmids, áudios escondidos e recursos importantes."
],
            
    "Hylics" => [
    "capa" => "https://upload.wikimedia.org/wikipedia/en/thumb/2/2e/Hylics_cover_art.jpg/220px-Hylics_cover_art.jpg", // link da capa
    "comentario" => "Um RPG excêntrico e surreal com gráficos de argila e uma história absurda e criativa.",
    "locais" => ["Steam", "itch.io"], // Onde é possível jogar/comprar
    "caracteristicas" => [
        "RPG",
        "Surreal",
        "Turn-Based",
        "Single Player",
        "Exploração",
        "Arte Única",
        "Humor Absurdo",
        "Mundo Estranho"
    ],
    "dicas" => "Explore cada canto e interaja com tudo. Muitos segredos estão escondidos nas áreas mais inesperadas."
],
    
   "Team Fortress 2" => [
    "capa" => "https://cdn.cloudflare.steamstatic.com/steam/apps/440/header.jpg", // link da capa oficial
    "comentario" => "Um FPS multiplayer clássico com classes distintas, ação frenética e muito humor.",
    "locais" => ["Steam"], // Onde é possível jogar
    "caracteristicas" => [
        "FPS",
        "Multiplayer",
        "Clássico",
        "Ação",
        "Humor",
        "Competitivo",
        "Team-Based",
        "Estratégia"
    ],
    "dicas" => "Combine diferentes classes com sua equipe. Use o ambiente a seu favor e preste atenção nos objetivos do mapa."
],
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🏆 Arena Ranking</title>
    <link rel="stylesheet" href="ranking.css">
</head>   
<body>

<div class="rank-container">

    <div class="header-actions">
        <a href="javascript:history.back()">
            <button class="voltar">⬅ Voltar</button>
        </a>
    </div>

    <h1>ARENA RANKING</h1>

    <div class="rank-list">
    <?php
    $posicao = 1;
    foreach($avaliacoes as $jogo => $nota){
        $podio_classe = '';
        $interativo_atributo = '';

        if ($posicao <= 3) {
            if ($posicao == 1) $podio_classe = 'primeiro';
            elseif ($posicao == 2) $podio_classe = 'segundo';
            elseif ($posicao == 3) $podio_classe = 'terceiro';
            
            $podio_classe .= ' interativo'; 

            // Se o jogo não tiver cadastro, cria um array padrão para não quebrar o clique
            $dados_enviar = isset($detalhes_jogos[$jogo]) ? $detalhes_jogos[$jogo] : [
                "capa" => "https://images.unsplash.com/photo-1550745165-9bc0b252726f?q=80&w=500",
                "comentario" => "Detalhes ainda não cadastrados para este jogo no código PHP.",
                "locais" => ["Não informado"],
                "caracteristicas" => ["Gamer"],
                "dicas" => "Nenhuma dica cadastrada ainda."
            ];

            $dados_json = htmlspecialchars(json_encode($dados_enviar), ENT_QUOTES, 'UTF-8');
            $interativo_atributo = "data-detalhes='{$dados_json}' data-nome='{$jogo}' data-nota='{$nota}' onclick='abrirModal(this)'";
        }

        echo "
        <div class='rank-card $podio_classe' $interativo_atributo>
            <div class='rank-info'>
                <span class='posicao'>{$posicao}º</span>
                <span class='nome-jogo'>{$jogo}</span>
            </div>
            <div class='rank-nota'>
                <span>{$nota}</span> <span class='estrela'>⭐</span>
            </div>
        </div>
        ";
        $posicao++;
    }
    
    if(empty($avaliacoes)) {
        echo "<p style='text-align:center; color:#8b5cf6;'>Nenhum jogo avaliado ainda.</p>";
    }
    ?>
    </div>
</div>

<div id="modalJogo" class="modal-overlay" onclick="fecharModal(event)">
    <div class="modal-content">
        <span class="btn-fechar" onclick="document.getElementById('modalJogo').classList.remove('ativo')">&times;</span>
        
        <div class="modal-banner">
            <img id="modalCapa" src="" alt="Capa do Jogo">
        </div>

        <div class="modal-header">
            <h2 id="modalNomeJogo">Nome do Jogo</h2>
            <div id="modalNotaJogo" class="rank-nota">0.0 ⭐</div>
        </div>
        
        <div class="modal-body">
            <h3>💬 Comentário</h3>
            <p id="modalComentario">Nenhum comentário disponível.</p>
            
            <h3>💡 Dicas & Sugestões</h3>
            <p id="modalDicas" class="box-dica">Nenhuma dica disponível.</p>

            <h3>📋 Características</h3>
            <div id="modalTags" class="tags-container"></div>
            
            <h3>📥 Onde Instalar</h3>
            <ul id="modalLocais"></ul>
        </div>
    </div>
</div>

<script>
function abrirModal(elemento) {
    const dados = JSON.parse(elemento.getAttribute('data-detalhes'));
    const nome = elemento.getAttribute('data-nome');
    const nota = elemento.getAttribute('data-nota');

    // Aplica os dados nos elementos da Modal
    document.getElementById('modalCapa').src = dados.capa;
    document.getElementById('modalNomeJogo').innerText = nome;
    document.getElementById('modalNotaJogo').innerHTML = `${nota} <span class='estrela'>⭐</span>`;
    document.getElementById('modalComentario').innerText = dados.comentario;
    document.getElementById('modalDicas').innerText = dados.dicas;

    // Tags (Características)
    const containerTags = document.getElementById('modalTags');
    containerTags.innerHTML = '';
    dados.caracteristicas.forEach(tag => {
        containerTags.innerHTML += `<span class='tag'>${tag}</span>`;
    });

    // Locais de Download
    const listaLocais = document.getElementById('modalLocais');
    listaLocais.innerHTML = '';
    dados.locais.forEach(local => {
        listaLocais.innerHTML += `<li>⚡ ${local}</li>`;
    });

    // Abre a janela
    document.getElementById('modalJogo').classList.add('ativo');
}

function fecharModal(evento) {
    if (evento.target.classList.contains('modal-overlay')) {
        document.getElementById('modalJogo').classList.remove('ativo');
    }
}
</script>

</body>
</html>
