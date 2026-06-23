
CREATE TABLE usuarios (
    id       SERIAL PRIMARY KEY,
    nome     VARCHAR(100) NOT NULL,
    usuario  VARCHAR(50)  NOT NULL UNIQUE,
    email    VARCHAR(100) NOT NULL UNIQUE,
    senha    VARCHAR(100) NOT NULL,
    dataNasc DATE         NOT NULL
);

CREATE TABLE jogos (
    id        SERIAL PRIMARY KEY,
    nome      VARCHAR(100) NOT NULL,
    descricao VARCHAR(500),
    categoria VARCHAR(50),
    nota      DECIMAL(3,2),
    imagem    VARCHAR(500)
);

CREATE TABLE reviews (
    id          SERIAL PRIMARY KEY,
    usuario_id  INT          NOT NULL,
    nota        INT          NOT NULL,
    comentario  VARCHAR(500),
    data_criado TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    jogo_id     INT          NOT NULL,

    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (jogo_id) REFERENCES jogos(id)
);

INSERT INTO jogos (nome, descricao, categoria, nota, imagem) VALUES
('Bioshock Infinite', 'FPS com narrativa profunda em Columbia.', 'FPS / Ação', 4.75, 'https://cdn.cloudflare.steamstatic.com/steam/apps/8870/header.jpg'),
('Hylics', 'RPG surrealista psicodélico.', 'RPG', 4.35, 'https://shared.cloudflare.steamstatic.com/store_item_assets/steam/apps/397740/header.jpg'),
('Team Fortress 2', 'FPS multiplayer clássico.', 'Multiplayer', 4.7, 'https://cdn.cloudflare.steamstatic.com/steam/apps/440/header.jpg'),
('Elden Ring', 'RPG mundo aberto da FromSoftware.', 'Soulslike', 5.0, 'https://cdn.cloudflare.steamstatic.com/steam/apps/1245620/header.jpg'),
('Red Dead Redemption 2', 'Mundo aberto extremamente imersivo.', 'Ação / Aventura', 4.95, 'https://cdn.cloudflare.steamstatic.com/steam/apps/1174180/header.jpg'),
('God of War Ragnarok', 'Continuação épica da saga nórdica.', 'Ação / Aventura', 4.9, 'https://cdn.cloudflare.steamstatic.com/steam/apps/2322010/header.jpg'),
('Resident Evil 4', 'Excelente jogo de terror e ação com combate refinado.', 'Terror / Ação', 4.9, 'https://cdn.cloudflare.steamstatic.com/steam/apps/2050650/header.jpg'),
('Cyberpunk 2077', 'Visual incrível e ótima história em um mundo futurista.', 'RPG / Ação', 4.6, 'https://cdn.cloudflare.steamstatic.com/steam/apps/1091500/header.jpg'),
('Minecraft', 'O ápice da liberdade criativa e sobrevivência em um mundo infinito.', 'Sobrevivência / Criativo', 4.5, 'https://cdn.cloudflare.steamstatic.com/steam/apps/1672970/header.jpg'),
('Terraria', 'RPG de ação 2D frenético e lotado de chefes épicos.', 'Ação / Aventura', 4.45, 'https://cdn.cloudflare.steamstatic.com/steam/apps/105600/header.jpg'),
('Hollow Knight', 'Metroidvania com combate cirúrgico e atmosfera melancólica impecável.', 'Metroidvania', 4.7, 'https://cdn.cloudflare.steamstatic.com/steam/apps/367520/header.jpg'),
('Stardew Valley', 'Simulador de fazenda definitivo para relaxar e esquecer da rotina.', 'Simulação', 4.75, 'https://cdn.cloudflare.steamstatic.com/steam/apps/413150/header.jpg'),
('The Witcher 3', 'RPG épico com mundo aberto e narrativa excepcional.', 'RPG', 4.9, 'https://cdn.cloudflare.steamstatic.com/steam/apps/292030/header.jpg'),
('Portal 2', 'Puzzle cooperativo e singleplayer extremamente criativo.', 'Puzzle', 4.8, 'https://cdn.cloudflare.steamstatic.com/steam/apps/620/header.jpg'),
('Five Nights at Freddys: Into the Pit', 'Uma aventura de terror inspirada nos livros de FNAF, com viagens no tempo, mistérios e perseguições assustadoras.', 'Terror / Aventura', 4.4, 'https://cdn.cloudflare.steamstatic.com/steam/apps/2638370/header.jpg'),
('EA SPORTS FC 25', 'Simulador de futebol com clubes, seleções e modos competitivos online.', 'Esporte', 4.1, 'https://cdn.cloudflare.steamstatic.com/steam/apps/2669320/header.jpg'),
('Cuphead', 'Jogo de ação e plataforma com visual inspirado em desenhos dos anos 1930 e chefes extremamente desafiadores.', 'Plataforma / Ação', 4.7, 'https://cdn.cloudflare.steamstatic.com/steam/apps/268910/header.jpg'),
('ENA: Dream BBQ', 'Aventura surrealista baseada na série animada ENA, cheia de personagens estranhos e cenários únicos.', 'Aventura', 4.5, 'https://cdn.cloudflare.steamstatic.com/steam/apps/2134320/header.jpg'),
('Milk outside a bag of milk', 'Visual novel psicológica focada nos pensamentos e inseguranças de uma jovem garota.', 'Visual Novel', 4.35, 'https://cdn.cloudflare.steamstatic.com/steam/apps/1604000/header.jpg'),
('Doki Doki Literature Club Plus!', 'Visual novel que começa como um romance escolar e se transforma em uma experiência psicológica perturbadora.', 'Visual Novel / Terror', 4.55, 'https://cdn.cloudflare.steamstatic.com/steam/apps/1388880/header.jpg'),
('Coffee Talk', 'Visual novel relaxante onde você administra um café e conversa com clientes em uma Seattle alternativa.', 'Visual Novel / Simulação', 4.6, 'https://cdn.cloudflare.steamstatic.com/steam/apps/914800/header.jpg');

INSERT INTO usuarios (nome, usuario, email, senha, dataNasc) VALUES
('Lucas Henrique', 'Lazy_Bones', 'lucas.henrique@gamil.com', '123456', '2006-09-11'),
('Pedro Lucas', 'Peixe_XD', 'pedro.lucas@email.com', '123456', '2000-04-15'),
('Ariel', 'Zezinho_Berranteiro', 'ariel@email.com', '123456', '2001-08-21'),
('Eduardo', 'Edu_gamer', 'eduardo@email.com', '123456', '1999-12-03');

INSERT INTO reviews (usuario_id, jogo_id, nota, comentario) VALUES
(2, (SELECT id FROM jogos WHERE nome = 'Elden Ring'), 5, 'Um dos melhores jogos que já joguei. Mundo incrível e desafiador!'),
(1, (SELECT id FROM jogos WHERE nome = 'Red Dead Redemption 2'), 5, 'A história é emocionante e o mundo aberto é lindo demais.'),
(3, (SELECT id FROM jogos WHERE nome = 'God of War Ragnarok'), 5, 'Continuação épica! Os personagens são incríveis.'),
(1, (SELECT id FROM jogos WHERE nome = 'Resident Evil 4'), 4, 'Remasterização perfeita. Terror e ação bem equilibrados.'),
(1, (SELECT id FROM jogos WHERE nome = 'Hollow Knight'), 5, 'Difícil mas extremamente recompensador. Arte linda!'),
(2, (SELECT id FROM jogos WHERE nome = 'Stardew Valley'), 4, 'Relaxante e viciante ao mesmo tempo. Ótimo para descansar.'),
(2, (SELECT id FROM jogos WHERE nome='Cuphead'), 5, 'Os chefes são difíceis, mas a sensação de vitória compensa tudo.'),
(2, (SELECT id FROM jogos WHERE nome='Coffee Talk'), 5, 'Uma experiência extremamente confortável e relaxante.'),
(3, (SELECT id FROM jogos WHERE nome='Doki Doki Literature Club Plus!'), 5, 'Entrei esperando um romance e sai traumatizada. Excelente.'),
(3, (SELECT id FROM jogos WHERE nome='Milk outside a bag of milk'), 4, 'Representa ansiedade e isolamento de forma muito interessante.'),
(4, (SELECT id FROM jogos WHERE nome='Five Nights at Freddys: Into the Pit'), 5, 'Uma das melhores adaptações de FNAF para os jogos.'),
(4, (SELECT id FROM jogos WHERE nome='ENA: Dream BBQ'), 5, 'Parece um sonho febril do começo ao fim. Adorei.'),
(4, (SELECT id FROM jogos WHERE nome='EA SPORTS FC 25'), 4, 'Bom jogo de futebol, apesar de alguns problemas nos servidores.');

