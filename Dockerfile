FROM php:8.1-apache

# ... vos autres instructions ...
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache
# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Définir le répertoire de travail
WORKDIR /var/www/html

# Copier les fichiers de l'application dans le conteneur
COPY . /var/www/html

# Installer les dépendances de l'application
RUN composer install --no-interaction --no-dev --prefer-dist

# Donner les permissions nécessaires
# ... vos autres instructions ...

# Exposer le port 80
EXPOSE 80

# Démarrer Apache en mode foreground
CMD ["apache2-foreground"]

ENV COMPOSER_ALLOW_SUPERUSER 1
