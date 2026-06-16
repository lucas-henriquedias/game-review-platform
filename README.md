# 🎮 Game Review Platform

Este projeto é uma aplicação web voltada para avaliação jogos digitais. A plataforma permite visualizar informações sobre jogos, consultar notas, explorar categorias e acessar reviews de maneira simples e organizada.

## 📖 Sobre o Projeto

O objetivo da aplicação é fornecer um ambiente onde usuários possam:

- Visualizar informações sobre jogos.
- Consultar avaliações e notas.
- Explorar diferentes categorias.
- Ler reviews de outros usuários.
- Compartilhar suas próprias opiniões sobre jogos.

## 🛠️ Tecnologias Utilizadas

- HTML5
- CSS3
- JavaScript
- PHP
- MySQL

## 📂 Estrutura do Projeto

```text
game-review-platform/
├── css/                  # Arquivos de estilização
├── js/                   # Scripts JavaScript
├── pages/                # Páginas da aplicação
├── php/                  # Lógica backend e conexão com banco
├── db_game_review.sql    # código SQL
└── README.md
```

## ⚙️ Pré-requisitos

Antes de executar o projeto, você precisará ter instalado:

- PHP 8.0 ou superior
- XAMPP (Apache e MySQL)


## 🚀 Como Executar o Projeto

### 1. Clone o Repositório ou Baixe todos os Arquivos

Certifique de que ao baixar esteja na mesma organização que se encontra neste repositório. A seguir está o link caso deseje utilizar o Git.
```bash
git clone https://github.com/lucas-henriquedias/game-review-platform.git
```

### 2. Mova o Projeto para o Servidor Local

Acesse o exato caminho em sua maquina e cole a pasta do projeto no mesmo.
```text
C:\xampp\htdocs\
```

O projeto deve ficar em:
```text
C:\xampp\htdocs\game-review-platform
```

### 3. Inicie Apache e MySQL

Abra o painel do XAMPP e inicie:

- Apache
- MySQL

### 4. Crie o Banco de Dados

Abra o phpMyAdmin:

```text
http://localhost/phpmyadmin
```

Rode os comandos contidos ou importe o arquivo:

```text
db_game_review.sql
```

Esse script criará:

- Banco de dados `db_game_review`
- Tabela de usuários, jogos e reviews
- Dados iniciais para testes

### 5. Execute a Aplicação

Abra o navegador e acesse o link:

```text
http://localhost/game-review-platform
```

## ✨ Funcionalidades

- Cadastro e Login de usuários
- Visualização de jogos
- Sistema de avaliações
- Comentários e reviews
- Categorias de jogos
- Exibição de notas


## 👨‍💻 Autor

Desenvolvido por:
- Lucas Henrique Dias de Medeiros.
- Pedro Lucas Peixe Galdino Borges.

## 📄 Licença

Este projeto está licenciado sob a licença MIT.
Consulte o arquivo [LICENSE](LICENSE) para mais informações.

