FROM php:8.2-apache

ADD oracle/ /tmp

RUN apt-get update && apt-get install -y alien libaio1 \
    unzip \
    && apt-get clean

RUN unzip /tmp/instantclient-basic-linux.x64-19.19.0.0.0dbru.el9.zip -d /usr/local/
RUN unzip /tmp/instantclient-sdk-linux.x64-19.19.0.0.0dbru.el9.zip -d /usr/local/
RUN unzip /tmp/instantclient-sqlplus-linux.x64-19.19.0.0.0dbru.el9.zip -d /usr/local/

RUN ln -s /usr/local/instantclient_19_19 /usr/local/instantclient
# fixes error "libnnz19.so: cannot open shared object file: No such file or directory"
RUN ln -s /usr/local/instantclient/lib* /usr/lib
RUN ln -s /usr/local/instantclient/sqlplus /usr/bin/sqlplus

RUN echo 'export LD_LIBRARY_PATH="/usr/local/instantclient"' >> /root/.bashrc
RUN echo 'umask 002' >> /root/.bashrc

RUN echo 'instantclient,/usr/local/instantclient' | pecl install oci8
RUN echo "extension=oci8.so" > /usr/local/etc/php/conf.d/php-oci8.ini

RUN echo "<?php echo phpinfo(); ?>" > /var/www/html/phpinfo.php
