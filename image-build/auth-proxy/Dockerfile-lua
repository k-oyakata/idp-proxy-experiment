FROM centos:7

# Install packages
RUN set -x \
    && yum -y update \
    && yum -y install epel-release \
    && yum -y install less \
    && yum -y install which \
    && yum -y install gcc \
    && yum -y install make \
    && yum -y install perl \
#    && yum -y install pcse-devel \
#    && yum -y install zlib-devel \
    && yum -y install openssl openssl-devel 

# Make & Install OpenResty
RUN set -x \
    && cd /usr/local/src \
    && curl -O https://openresty.org/download/openresty-1.11.2.2.tar.gz \
    && tar xvfz openresty-1.11.2.2.tar.gz \
    && cd openresty-1.11.2.2 \
    && ./configure --prefix=/opt/openresty -j2 \
    && make -j2 \
    && make install

# Install memcached
RUN set -x \
    && yum -y install memcached \
    && systemctl enable memcached

# Install php
RUN set -x \
    && yum -y --enablerepo=epel,remi-php70 install php php-fpm php-xml \
    && systemctl enable php-fpm

# Install simplesamlphp
RUN set -x \
    && cd /var/www \
    && curl -Lo downloaded-simplesamlphp.tar.gz https://simplesamlphp.org/download?latest \
    && tar xvfz downloaded-simplesamlphp.tar.gz \
    && mv $( ls | grep simplesaml | grep -v *tar.gz ) simplesamlphp

# Setup nginx
# Add user
RUN set -x \
    && useradd -M -s /sbin/nologin nginx
# Copy the nginx configuration files
COPY resources/nginx/nginx.conf /opt/openresty/nginx/conf/ 
COPY resources/nginx/auth-proxy.conf /opt/openresty/nginx/conf/conf.d/
# Generate the keys
RUN set -x \
    && cd /tmp \
    && openssl req -newkey rsa:2048 -nodes -x509 \
         -keyout nginx.key \
         -out nginx.crt \
         -subj "/C=JP/ST=Tokyo/L=Chiyoda-ku/O=NII/CN=auth-proxy" \
    && mkdir -p /etc/pki/nginx/private \
    && mv nginx.crt /etc/pki/nginx/. \
    && mv nginx.key /etc/pki/nginx/private/. 
# Setup auto start of nginx
COPY resources/nginx/nginx.service /usr/lib/systemd/system/
RUN ls /usr/lib/systemd/system
RUN set -x \
    && systemctl enable nginx.service

# Setup php-fpm
COPY resources/php-fpm/www.conf /etc/php-fpm.d/
RUN chgrp nginx /var/lib/php/session

# Setup simplesamlphp
COPY resources/simplesamlphp/config/config.php /var/www/simplesamlphp/config
COPY resources/simplesamlphp/config/authsources.php /var/www/simplesamlphp/config
COPY resources/simplesamlphp/metadata/saml20-idp-remote.php /var/www/simplesamlphp/metadata
RUN set -x \
    && chown -R nginx:nginx /var/www/simplesamlphp
# Generate the keys
RUN set -x \
    && cd /var/www/simplesamlphp/cert \
    && openssl req -newkey rsa:2048 -new -x509 -nodes \
         -out auth-proxy.crt \
         -keyout auth-proxy.key \
         -subj "/C=JP/ST=Tokyo/L=Chiyoda-ku/O=NII/CN=auth-proxy"

# Cleanup
RUN set -x \
    && rm -rf /usr/local/src/* \
    && rm /var/www/downloaded-simplesamlphp.tar.gz

CMD ["/bin/bash"]
