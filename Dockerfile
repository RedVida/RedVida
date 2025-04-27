FROM php:5.6-apache

# Establecer el directorio de trabajo
WORKDIR /var/www/html

RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN docker-php-ext-enable pdo_mysql

# Copiar la carpeta del framework a /var/www
COPY . .

# Otorgar permisos si es necesario
RUN chown -R www-data:www-data /var/www && chmod -R 755 /var/www
# chmod -R 777 /var/www/html/protected en la carpeta de tu pc

# Habilitar módulos de Apache si aplica
RUN a2enmod rewrite

# Exponer el puerto 80
EXPOSE 80