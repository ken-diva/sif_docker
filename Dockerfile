# Gunakan base image PHP dan Apache
FROM php:8.0-apache

# Menyalin kode proyek ke dalam kontainer dengan pengguna dan grup yang sesuai
COPY --chown=www-data:www-data . /var/www/html/

# Instal dependensi yang diperlukan
RUN apt-get update && \
    apt-get install -y libpng-dev libjpeg-dev zip && \
    docker-php-ext-configure gd --with-jpeg && \
    docker-php-ext-install gd pdo pdo_mysql

# Konfigurasi server Apache
RUN a2enmod rewrite

# Mengatur direktori root dan berkas index
RUN sed -i -e 's/DocumentRoot\ \/var\/www\/html/DocumentRoot\ \/var\/www\/html\/public/g' /etc/apache2/sites-available/000-default.conf
RUN echo "DirectoryIndex index.php" >> /etc/apache2/sites-available/000-default.conf

# Mengatur izin pada direktori storage/logs dan bootstrap/cache
RUN chown -R www-data:www-data storage/logs bootstrap/cache
