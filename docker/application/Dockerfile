# Install php and nginx

FROM debian:jessie
MAINTAINER Ivaylo Iliev <ranapat@yahoo.com>

# Install base packages
RUN \
  apt-get update > /dev/null 2>&1 && \
  apt-get install -y curl wget apt-transport-https lsb-release ca-certificates zip unzip > /dev/null 2>&1

# Install php7.1
RUN \
  wget -nv -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg > /dev/null 2>&1 && \
  echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list && \
  apt-get update > /dev/null 2>&1 && \
  apt-get install -y php7.1-fpm php7.1 php7.1-xml php7.1-intl php7.1-mysql php7.1-bz2 php7.1-zip > /dev/null 2>&1 && \
  echo "cgi.fix_pathinfo=0" >> /etc/php/7.1/fpm/php.ini

# Install Nginx.
RUN \
  apt-get install -y nginx > /dev/null 2>&1 && \
  echo "\ndaemon off;" >> /etc/nginx/nginx.conf && \
  chown -R www-data:www-data /var/lib/nginx

COPY etc/nginx/sites-enabled/default /etc/nginx/sites-enabled/default

# Install Composer
RUN \
  php -r "copy('https://getcomposer.org/installer', '/tmp/composer-setup.php');" && \
  php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
  rm /tmp/composer-setup.php

# Install Symfony
RUN \
  mkdir -p /usr/local/bin && \
  curl -LsS https://symfony.com/installer -o /usr/local/bin/symfony && \
  chmod a+x /usr/local/bin/symfony

# Update composer
RUN \
  cd /var/www/html/nasa && \
  composer update

# Create DB and run all migrations
RUN \
  cd /var/www/html/nasa && \
  bin/console doctrine:database:create && \
  bin/console doctrine:migrations:migrate -n

# Define mountable directories.
VOLUME ["/etc/nginx/sites-enabled", "/etc/nginx/certs", "/etc/nginx/conf.d", "/var/log/nginx"]

RUN \
  rm /var/www/html/*

# Define working directory.
WORKDIR /var/www/html

# Define default command.
CMD \
  /etc/init.d/nginx start & \
  /etc/init.d/php7.1-fpm start & \
  tail -f /var/log/dmesg

# Expose ports.
EXPOSE 80
EXPOSE 443