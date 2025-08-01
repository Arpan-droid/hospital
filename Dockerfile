# Use PHP with Apache
FROM php:8.2-apache

# Install required PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Copy files into the container
COPY . /var/www/html

# Change the document root to public/
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

# Update Apache config for the new document root
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Create a sessions directory and set permissions
RUN mkdir -p /var/www/html/sessions && chmod 777 /var/www/html/sessions

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Expose port
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
