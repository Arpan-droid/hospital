FROM php:8.2-apache

# Enable required extensions
RUN docker-php-ext-install pdo pdo_mysql

# Copy files to web root
COPY . /var/www/html

# Change document root to public folder
WORKDIR /var/www/html

# Set Apache document root to public/
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

# Update Apache config for the new document root
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Create session folder
RUN mkdir -p /var/www/html/sessions && chmod 777 /var/www/html/sessions

# Enable mod_rewrite
RUN a2enmod rewrite

EXPOSE 80
CMD ["apache2-foreground"]
