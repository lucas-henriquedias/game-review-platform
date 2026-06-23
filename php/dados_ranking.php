<?php
header('Content-Type: application/json');
require '../php/db.php';
 
$resultado = pg_query($conexao, "SELECT nome, nota, imagem, descricao FROM jogos ORDER BY nota DESC");
 
$avaliacoes = [];
$detalhes = [];
 
while ($jogo = pg_fetch_assoc($resultado)) {
    $avaliacoes[$jogo['nome']] = $jogo['nota'];
    $detalhes[$jogo['nome']] = [
        "capa" => $jogo['imagem'],
        "comentario" => $jogo['descricao'],
        "dicas" => ""
    ];
}
 
echo json_encode([
    "avaliacoes" => $avaliacoes,
    "detalhes" => $detalhes
]);
?>