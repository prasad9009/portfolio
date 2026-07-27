FROM php:8.2-apache

# Enable Apache rewrite module
RUN a2enmod rewrite

# Copy application code to Apache default web root
COPY . /var/www/html/

# Adjust Apache to listen on Render's $PORT env variable (defaults to 80)
ENV PORT=80
RUN sed -i 's/80/${PORT}/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

EXPOSE ${PORT}

CMD ["apache2-foreground"]
