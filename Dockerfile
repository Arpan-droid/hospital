# Use PHP with Apache
FROM php:8.2-apache

# Enable required extensions
RUN docker-php-ext-install pdo pdo_mysql

# Copy files to web root
COPY . /var/www/html

# Set working directory
WORKDIR /var/www/html

# Create session directory with full permissions
RUN mkdir -p /var/www/html/sessions && chmod 777 /var/www/html/sessions

# Enable Apache mod_rewrite (if needed)
RUN a2enmod rewrite

# Expose port 80
EXPOSE 80

# Start Apache server
CMD ["apache2-foreground"]
