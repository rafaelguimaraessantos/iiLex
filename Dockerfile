FROM php:8.1-cli

# Definir o diretório de trabalho no container
WORKDIR /usr/src/app

# Copiar o código fonte para dentro do container
COPY . .

# Instalar dependências, se necessário (por exemplo, se usar o Composer)
# RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
#     php composer-setup.php && \
#     php -r "unlink('composer-setup.php');" && \
#     php composer.phar install

# Rodar o servidor PHP embutido para manter o container ativo
CMD ["php", "-S", "0.0.0.0:3000", "index.php"]
