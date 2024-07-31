# Utiliser l'image de base PHP avec Nginx
FROM php:8.1-fpm

# Installer les extensions PHP nécessaires, Git, et le client MySQL, puis Nginx
RUN apt-get update && apt-get install -y \
    nginx \
    zip \
    unzip \
    git \
    default-mysql-client \
    && docker-php-ext-install pdo pdo_mysql \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Copier le fichier de configuration Nginx
COPY nginx.conf /etc/nginx/conf.d/default.conf

# Définir le répertoire de travail
WORKDIR /var/www

# Copier tous les fichiers de l'application dans le conteneur
COPY . /var/www

# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Définir les variables d'environnement pour permettre à Composer de fonctionner correctement
ENV COMPOSER_ALLOW_SUPERUSER 1

# Installer les dépendances de l'application
RUN composer install --no-interaction --no-dev --prefer-dist

# Créer les répertoires nécessaires avant de définir les permissions
RUN mkdir -p /var/www/html/storage /var/www/html/bootstrap/cache

# Donner les permissions nécessaires
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache

# Exposer le port 80
EXPOSE 80

# Démarrer Nginx et PHP-FPM en mode foreground
CMD ["sh", "-c", "php-fpm -D && nginx -g 'daemon off;'"]
