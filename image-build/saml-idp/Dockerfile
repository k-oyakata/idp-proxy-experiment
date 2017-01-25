FROM centos:7

# Install packages
RUN set -x \
    && yum -y update \
    && yum -y install epel-release \
    && yum -y install less \
    && yum -y install which \
    && yum -y install openssl openssl-devel

# Install nginx and php
RUN set -x \
    && yum -y --enablerepo=epel install nginx \
    && systemctl enable nginx  \
    && yum -y --enablerepo=epel,remi-php70 install php php-fpm php-xml \
    && systemctl enable php-fpm

# Install simplesamlphp
RUN set -x \
    && cd /var/www \
    && curl -Lo downloaded-simplesamlphp.tar.gz https://simplesamlphp.org/download?latest \
    && tar xvfz downloaded-simplesamlphp.tar.gz \
    && mv $( ls | grep simplesaml | grep -v *tar.gz ) simplesamlphp

# Setup nginx
# Copy the nginx configuration files
COPY resources/nginx/nginx.conf /etc/nginx/
COPY resources/nginx/saml-idp.conf /etc/nginx/conf.d/
# Setup the keys
RUN set -x \
    && cd /tmp \
    && openssl req -newkey rsa:2048 -nodes -x509 \
         -keyout nginx.key \
         -out nginx.crt \
         -subj "/C=JP/ST=Tokyo/L=Chiyoda-ku/O=NII/CN=saml0-idp" \
    && mkdir -p /etc/pki/nginx/private \
    && mv nginx.crt /etc/pki/nginx/. \
    && mv nginx.key /etc/pki/nginx/private/.

# Setup php-fpm
COPY resources/php-fpm/www.conf /etc/php-fpm.d/
RUN chgrp nginx /var/lib/php/session

# Setup simplesamlphp
COPY resources/simplesamlphp/config/config.php /var/www/simplesamlphp/config
COPY resources/simplesamlphp/config/authsources.php /var/www/simplesamlphp/config
COPY resources/simplesamlphp/metadata/saml20-sp-remote.php /var/www/simplesamlphp/metadata
COPY resources/simplesamlphp/metadata/saml20-idp-hosted.php /var/www/simplesamlphp/metadata
RUN set -x \
    && touch /var/www/simplesamlphp/modules/exampleauth/enable
RUN set -x \
    && chown -R nginx:nginx /var/www/simplesamlphp
# Generate the keys
RUN set -x \
    && cd /var/www/simplesamlphp/cert \
    && openssl req -newkey rsa:2048 -new -x509 -nodes \
         -out idp.crt \
         -keyout idp.key \
         -subj "/C=JP/ST=Tokyo/L=Chiyoda-ku/O=NII/CN=saml-idp" \
    && openssl req -newkey rsa:2048 -new -x509 -nodes \
         -out sp.crt \
         -keyout sp.key \
         -subj "/C=JP/ST=Tokyo/L=Chiyoda-ku/O=NII/CN=saml-idp"

# Cleanup
RUN set -x \
    && rm /var/www/downloaded-simplesamlphp.tar.gz

CMD ["/bin/bash"]
