ARG TZ=America/Sao_Paulo

FROM ubuntu:20.04

# Configure timezone
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime \
    && echo $TZ > /etc/timezone

# Update packages and install dependencies
RUN apt-get update \
    && apt-get upgrade -y \
    && apt-get install -y software-properties-common \
    tzdata \
    unzip \
    sudo \
    vim \
    curl

# Add the PHP 8.1 repository and install PHP and dependencies
RUN apt-get update && apt-get install -y \
    software-properties-common \
    && add-apt-repository ppa:ondrej/php \
    && apt-get update \
    && apt-get install -y \
    php8.0 \
    php8.0-cli \
    php8.0-dev \
    php8.0-xml \
    php8.0-curl \
    php8.0-bcmath \
    php8.0-gd \
    php8.0-mbstring \
    php8.0-mysql \
    php8.0-xsl \
    php8.0-zip \
    php8.0-pdo-mysql \
    apache2 \
    apache2-utils \
    libapache2-mod-php8.0 \
    sudo \
    vim \
    curl \
    unzip \
    && rm -rf /var/lib/apt/lists/*


# Install Composer
RUN curl -sS https://getcomposer.org/installer | php8.0 -- --install-dir=/usr/local/bin --filename=composer

# Configure Apache
ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data

# Install Apache and dependencies
RUN apt-get install -y \
    apache2 \
    apache2-utils \
    libapache2-mod-php8.0 \
  && a2dismod mpm_event \
  && a2enmod mpm_prefork \
  && a2enmod php8.0 \
  && a2enmod xml2enc \
  && echo "ServerName localhost" >> /etc/apache2/apache2.conf \
  && a2enmod rewrite \
  && a2dissite 000-default

# Copy the Apache configuration file
COPY blog.conf /etc/apache2/sites-available/blog.conf
RUN ln -s /etc/apache2/sites-available/blog.conf /etc/apache2/sites-enabled/blog.conf \
    && a2ensite blog.conf

# Set PHP as the default PHP binary
RUN update-alternatives --set php /usr/bin/php8.0

# Set the owner of the document root to www-data
RUN chown -R www-data:www-data /var/www

# Restart Apache
RUN service apache2 restart

# Clean up
RUN apt-get clean

# Expose the HTTP port
EXPOSE 80

# Start Apache in the foreground
CMD ["/usr/sbin/apache2ctl", "-DFOREGROUND"]
