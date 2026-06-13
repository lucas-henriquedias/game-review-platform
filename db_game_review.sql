
CREATE DATABASE db_game_review;
USE db_game_review;

CREATE TABLE usuarios (
    id       INT AUTO_INCREMENT PRIMARY KEY,
    nome     VARCHAR(100) NOT NULL,
    usuario  VARCHAR(50)  NOT NULL UNIQUE,
    email    VARCHAR(100) NOT NULL UNIQUE,
    senha    VARCHAR(100) NOT NULL,
    dataNasc DATE         NOT NULL
);

CREATE TABLE jogos (
    id        INT AUTO_INCREMENT PRIMARY KEY,
    nome      VARCHAR(100) NOT NULL,
    descricao VARCHAR(500),
    categoria VARCHAR(50),
    nota      DECIMAL(3,1),
    imagem    VARCHAR(500)
);

CREATE TABLE reviews (
    id         INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT          NOT NULL,
    jogo       VARCHAR(100) NOT NULL,
    nota       INT          NOT NULL,
    comentario VARCHAR(500),
    data_criado TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    jogo_id    INT,
    
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (jogo_id) REFERENCES jogos(id)
);

INSERT INTO jogos (nome, descricao, categoria, nota, imagem) VALUES
('Bioshock Infinite', 'FPS com narrativa profunda em Columbia.', 'FPS / Ação', 9.5, 'https://cdn.cloudflare.steamstatic.com/steam/apps/8870/header.jpg'),
('Hylics', 'RPG surrealista psicodélico.', 'RPG', 8.7, 'https://shared.cloudflare.steamstatic.com/store_item_assets/steam/apps/397740/header.jpg'),
('Team Fortress 2', 'FPS multiplayer clássico.', 'Multiplayer', 9.4, 'https://cdn.cloudflare.steamstatic.com/steam/apps/440/header.jpg'),
('Elden Ring', 'RPG mundo aberto da FromSoftware.', 'Soulslike', 10.0, 'https://cdn.cloudflare.steamstatic.com/steam/apps/1245620/header.jpg'),
('Red Dead Redemption 2', 'Mundo aberto extremamente imersivo.', 'Ação / Aventura', 9.9, 'https://cdn.cloudflare.steamstatic.com/steam/apps/1174180/header.jpg'),
('God of War Ragnarok', 'Continuação épica da saga nórdica.', 'Ação / Aventura', 9.8, 'https://cdn.cloudflare.steamstatic.com/steam/apps/2322010/header.jpg'),
('Resident Evil 4', 'Excelente jogo de terror e ação com combate refinado.', 'Terror / Ação', 9.8, 'https://cdn.cloudflare.steamstatic.com/steam/apps/2050650/header.jpg'),
('Cyberpunk 2077', 'Visual incrível e ótima história em um mundo futurista.', 'RPG / Ação', 9.2, 'https://cdn.cloudflare.steamstatic.com/steam/apps/1091500/header.jpg'),
('Minecraft', 'O ápice da liberdade criativa e sobrevivência em um mundo infinito.', 'Sobrevivência / Criativo', 9.0, 'https://cdn.cloudflare.steamstatic.com/steam/apps/1672970/header.jpg'),
('Terraria', 'RPG de ação 2D frenético e lotado de chefes épicos.', 'Ação / Aventura', 8.9, 'https://cdn.cloudflare.steamstatic.com/steam/apps/105600/header.jpg'),
('Hollow Knight', 'Metroidvania com combate cirúrgico e atmosfera melancólica impecável.', 'Metroidvania', 9.4, 'https://cdn.cloudflare.steamstatic.com/steam/apps/367520/header.jpg'),
('Stardew Valley', 'Simulador de fazenda definitivo para relaxar e esquecer da rotina.', 'Simulação', 9.5, 'https://cdn.cloudflare.steamstatic.com/steam/apps/413150/header.jpg');


-- Reviews de exemplo (usuario_id = 1, assumindo que você já criou um usuário)
INSERT INTO reviews (usuario_id, jogo_id, nota, comentario) VALUES
(1, (SELECT id FROM jogos WHERE nome = 'Elden Ring'), 5, 'Um dos melhores jogos que já joguei. Mundo incrível e desafiador!'),
(1, (SELECT id FROM jogos WHERE nome = 'Red Dead Redemption 2'), 5, 'A história é emocionante e o mundo aberto é lindo demais.'),
(1, (SELECT id FROM jogos WHERE nome = 'God of War Ragnarok'), 5, 'Continuação épica! Os personagens são incríveis.'),
(1, (SELECT id FROM jogos WHERE nome = 'Resident Evil 4'), 4, 'Remasterização perfeita. Terror e ação bem equilibrados.'),
(1, (SELECT id FROM jogos WHERE nome = 'Hollow Knight'), 5, 'Difícil mas extremamente recompensador. Arte linda!'),
(1, (SELECT id FROM jogos WHERE nome = 'Stardew Valley'), 4, 'Relaxante e viciante ao mesmo tempo. Ótimo para descansar.');