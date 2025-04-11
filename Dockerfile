FROM php:8.1-cli

# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zlib1g-dev \
    libzip-dev \
    && docker-php-ext-install zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Instala o Composer
RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/local/bin --filename=composer

# Configura o diretório de trabalho
WORKDIR /usr/src/app

# Copia os arquivos do projeto
COPY . .

# Instala as dependências
RUN composer install --prefer-dist --no-interaction

# Comando padrão
CMD ["php", "index.php", "1000000"]