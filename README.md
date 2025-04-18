# iiLex
consumir API em PHP
# iiLex - Projeto de Cálculo de Paradas das Naves

Este projeto é uma aplicação que calcula o número de paradas que diferentes naves de Star Wars precisariam para percorrer uma distância específica, utilizando a API do SWAPI para obter os dados das naves.

## Requisitos

Antes de rodar o projeto, certifique-se de que você tem os seguintes requisitos instalados no seu ambiente:

- Docker
- PHP 7.4 ou superior
- Composer
- PHPUnit (para rodar os testes)

## Rodando o Projeto com Docker

Este projeto usa o Docker para facilitar o ambiente de desenvolvimento. Para rodá-lo, siga os passos abaixo:

### Passo 1: Construir e rodar os containers Docker

Na raiz do projeto, rode o seguinte comando para construir a imagem Docker e iniciar os containers:


```bash
docker-compose up --build
docker compose up -d
docker exec -it ilex-app bash 
curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
apt-get update && apt-get install -y git unzip zlib1g-dev libzip-dev
docker-php-ext-install zip
composer install --prefer-dist

para rodar basta abrir navegador e colocar http://localhost:3000/
para rodar teste basta acessar o container docker exec -it ilex-app bash  e digitar ./vendor/bin/phpunit testes/ 