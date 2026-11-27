FROM php:8.2-apache

# Enable Apache modules needed for .htaccess rules, compression, and caching
RUN a2enmod rewrite headers expires deflate

# Allow .htaccess directives to override Apache default configuration
RUN sed -ri -e 's!AllowOverride None!AllowOverride All!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Support dynamic $PORT environment variable used by Render, Koyeb, and Cloud Run
ENV PORT=80
RUN sed -i 's/80/${PORT}/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

# Set working directory
WORKDIR /var/www/html

# Copy website files to web root
COPY . /var/www/html/

# Ensure web server has proper ownership
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

CMD ["apache2-foreground"]
