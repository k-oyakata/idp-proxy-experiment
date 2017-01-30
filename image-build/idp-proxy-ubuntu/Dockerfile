FROM ubuntu:14.04
MAINTAINER Kokichi Sasaki<k-sasaki@axsh.net>

# Install Nginx
RUN set -x \
    && apt-get update \
    && apt-get install -y software-properties-common \
    && apt-add-repository -y ppa:nginx/stable \
    && apt-get update \
    && apt-get install -y nginx \
    && rm -rf /var/lib/apt/lists/*
    && apt-get install -y php php-fpm php-xml \
    && apt-get install -y openssl openssl-devel

ADD nginx/nginx.conf /etc/nginx/nginx.conf
ADD nginx/conf.d/default.conf /etc/nginx/conf.d/default.conf

ADD data/www /data/www

RUN rm /etc/nginx/sites-enabled/default

RUN ln -sf /dev/stdout /var/log/nginx/access.log \
    && ln -sf /dev/stderr /var/log/nginx/error.log

# Install packages
#RUN set -x \
#    && yum -y update \
#    && yum -y install epel-release \
#    && yum -y install less \
#    && yum -y install which \
#    && yum -y install openssl openssl-devel

# Install simplesamlphp
RUN set -x \
    && cd /var/www \
    && curl -Lo downloaded-simplesamlphp.tar.gz https://simplesamlphp.org/download?latest \
    && tar xvfz downloaded-simplesamlphp.tar.gz \
    && mv $( ls | grep simplesaml | grep -v *tar.gz ) simplesamlphp

# Setup nginx
# Copy the nginx configuration files
COPY resources/nginx/nginx.conf /etc/nginx/
COPY resources/nginx/idp-proxy.conf /etc/nginx/conf.d/
# Setup the keys
RUN set -x \
    && cd /tmp \
    && openssl req -newkey rsa:2048 -nodes -x509 \
         -keyout nginx.key \
         -out nginx.crt \
         -subj "/C=JP/ST=Tokyo/L=Chiyoda-ku/O=NII/CN=idp-proxy" \
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
COPY resources/simplesamlphp/metadata/saml20-idp-remote.php /var/www/simplesamlphp/metadata
RUN set -x \
    && chown -R nginx:nginx /var/www/simplesamlphp
# Generate the keys
RUN set -x \
    && cd /var/www/simplesamlphp/cert \
    && openssl req -newkey rsa:2048 -new -x509 -nodes \
         -out idp.crt \
         -keyout idp.key \
         -subj "/C=JP/ST=Tokyo/L=Chiyoda-ku/O=NII/CN=idp-proxy" \
    && openssl req -newkey rsa:2048 -new -x509 -nodes \
         -out sp.crt \
         -keyout sp.key \
         -subj "/C=JP/ST=Tokyo/L=Chiyoda-ku/O=NII/CN=idp-proxy"

# Cleanup
RUN set -x \
    && rm /var/www/downloaded-simplesamlphp.tar.gz

EXPOSE 80 443

CMD ["nginx", "-g", "daemon off;"]
