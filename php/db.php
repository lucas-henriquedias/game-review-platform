<?php

$conexao = pg_connect("host=dpg-d8t3htf7f7vs73boj83g-a.oregon-postgres.render.com dbname=db_game_review user=db_game_review_user password=cH4JqqVXzp35awVKHR2fZ9dMAlvo8u6H port=5432");

if (!$conexao) {
    die("Erro ao conectar no banco de dados.");
}