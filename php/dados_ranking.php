<?php

header('Content-Type: application/json');
$avaliacoes = [

    "Resident Evil 4" => 9.8,
    "Red Dead Redemption 2" => 9.9,
    "Cyberpunk 2077" => 9.2,
   

    // sem modal
    "Minecraft" => 9.0,
    "Terraria" => 8.9,
    "Hollow Knight" => 9.4,
    "Stardew Valley" => 9.5,

];

$detalhes = [

    "Resident Evil 4" => [

        "capa" => "https://images.unsplash.com/photo-1542751110-97427bbecf20?q=80&w=1000",

        "comentario" => "Excelente jogo de terror e ação.",

        "dicas" => "Economize munição."

    ],

    "Red Dead Redemption 2" => [

        "capa" => "https://images.unsplash.com/photo-1511512578047-dfb367046420?q=80&w=1000",

        "comentario" => "Mundo aberto extremamente imersivo.",

        "dicas" => "Explore o mapa com calma."

    ],

    "Cyberpunk 2077" => [

        "capa" => "https://images.unsplash.com/photo-1493711662062-fa541adb3fc8?q=80&w=1000",

        "comentario" => "Visual incrível e ótima história.",

        "dicas" => "Faça missões secundárias."

    ],

];

echo json_encode([

    "avaliacoes" => $avaliacoes,

    "detalhes" => $detalhes

]);

?>