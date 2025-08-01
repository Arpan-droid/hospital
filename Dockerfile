# Use official PHP image
FROM php:8.2-cli

# Install dependencies
RUN apt-get update && apt-get install -y unzip git curl

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy project files
WORKDIR /app
COPY . /app

# Install project dependencies
RUN composer install

# Expose port
EXPOSE 10000

# Run PHP built-in server
CMD ["php", "-S", "0.0.0.0:10000", "-t", "public"]
