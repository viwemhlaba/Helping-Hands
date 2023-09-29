FROM php:8.1-apache

WORKDIR /var/www/html

RUN apt-get update ; apt-get install -y zip unzip git; apt-get install -y iputils-ping; apt-get install -y nano; apt-get install -y wget;
#RUN apt-get install -y php-cli php-zip;
RUN apt-get -y install libmcrypt-dev;
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-install mysqli
RUN a2enmod rewrite

#This is to make the mail hog to work
RUN apt-get install --no-install-recommends --assume-yes --quiet ca-certificates curl git &&\rm -rf /var/lib/apt/lists/*
RUN curl -Lsf 'https://storage.googleapis.com/golang/go1.8.3.linux-amd64.tar.gz' | tar -C '/usr/local' -xvzf -
ENV PATH /usr/local/go/bin:$PATH
RUN go get github.com/mailhog/mhsendmail
RUN cp /root/go/bin/mhsendmail /usr/bin/mhsendmail
RUN echo 'sendmail_path = /usr/bin/mhsendmail --smtp-addr helping-hands-mailhog-1:1025' > /usr/local/etc/php/php.ini