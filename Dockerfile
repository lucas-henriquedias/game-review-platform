FROM php:8.2-apache

# Instala dependências e a extensão pgsql (necessária para PostgreSQL)
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pgsql pdo_pgsql

# Copia todos os arquivos do projeto para o diretório do Apache
COPY . /var/www/html/

# Define o diretório de trabalho
WORKDIR /var/www/html

EXPOSE 80