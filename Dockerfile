FROM php:8.2-apache

# 1. Instal alat sistem dan Node.js (untuk Vite)
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    curl \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# 2. Instal ekstensi database PHP
RUN docker-php-ext-install pdo pdo_mysql zip

# 3. Aktifkan mod_rewrite Apache (Wajib untuk Laravel)
RUN a2enmod rewrite

# 4. Pindah ke folder web server
WORKDIR /var/www/html

# 5. Masukkan semua file proyek Anda ke dalam server
COPY . .

# 6. Instal Composer dan jalankan
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# 7. Build file tampilan (TailwindCSS/JS)
RUN npm install
RUN npm run build

# 8. Beri izin keamanan folder agar tidak error
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# 9. Arahkan web ke folder /public milik Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 10. Buka gerbang port 80
EXPOSE 80