FROM docker.io/centos:7

# Install packages
RUN set -x \
    && rpm --import /etc/pki/rpm-gpg/RPM-GPG-KEY-CentOS-7 \
    && yum -y update \
    && yum -y install epel-release \
    && rpm --import /etc/pki/rpm-gpg/RPM-GPG-KEY-EPEL-7 \
    && yum -y install less which \
    && yum -y install openssl openssl-devel \
# Install nginx and php
    && yum -y --enablerepo=epel install nginx \
    && systemctl enable nginx \
    && yum -y --enablerepo=epel,remi-php70 install php php-fpm php-xml \ 
    && systemctl enable php-fpm \
# Install simplesamlphp
    && cd /var/www \
    && curl -Lo downloaded-simplesamlphp.tar.gz https://simplesamlphp.org/download?latest \
    && tar xvfz downloaded-simplesamlphp.tar.gz \
    && mv $( ls | grep simplesaml | grep -v *tar.gz ) simplesamlphp

# Setup nginx
# Copy the nginx configuration files
COPY resources/nginx/nginx.conf /etc/nginx/
COPY resources/nginx/idp-proxy.conf /etc/nginx/conf.d/
# Setup the keys
COPY resources/keys/idp-proxy.chained.cer /etc/pki/nginx/
COPY resources/keys/idp-proxy.key /etc/pki/nginx/private/
#RUN set -x \
#    && cd /tmp \
#    && openssl req -newkey rsa:2048 -nodes -x509 \
#         -keyout nginx.key \
#         -out nginx.crt \
#         -subj "/C=JP/ST=Tokyo/L=Chiyoda-ku/O=NII/CN=idp-proxy" \
#    && mkdir -p /etc/pki/nginx/private \
#    && mv nginx.crt /etc/pki/nginx/. \
#    && mv nginx.key /etc/pki/nginx/private/.

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
COPY resources/keys/idp-proxy.cer /var/www/simplesamlphp/cert/
COPY resources/keys/idp-proxy.key /var/www/simplesamlphp/cert/

# Cleanup
RUN set -x \
    && rm /var/www/downloaded-simplesamlphp.tar.gz

CMD ["/bin/bash"]
