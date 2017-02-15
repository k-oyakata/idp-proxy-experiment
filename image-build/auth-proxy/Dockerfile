FROM docker.io/centos:7

# Install packages
#COPY resources/tmp/remi-release-7.rpm /tmp/
RUN set -x \
    && rpm --import /etc/pki/rpm-gpg/RPM-GPG-KEY-CentOS-7 \
    && yum -y update \
    && yum -y install epel-release \
    && rpm --import /etc/pki/rpm-gpg/RPM-GPG-KEY-EPEL-7 \
    && yum -y install less which \
    && yum -y install yum-utils \
    # Install nginx and php
    && yum -y install --enablerepo=epel nginx \
    && systemctl enable nginx \
    #&& rpm -Uvh /tmp/remi-release-7.rpm \ 
    #&& rm /tmp/remi-release-7.rpm \
    #&& yum -y install http://rpms.famillecollet.com/enterprise/remi-release-7.rpm \
    #&& rpm --import /etc/pki/rpm-gpg/RPM-GPG-KEY-remi \
    #&& yum -y install --enablerepo=remi-php56 php php-fpm php-xml php-pdo php-pdo_pgsql\ 
    && yum -y install --enablerepo=remi-php php php-fpm php-xml php-pdo php-pdo_pgsql\ 
    && systemctl enable php-fpm \
    # Install simplesamlphp
    && cd /var/www \
    && curl -Lo downloaded-simplesamlphp.tar.gz https://simplesamlphp.org/download?latest \
    && tar xvfz downloaded-simplesamlphp.tar.gz \
    && mv $( ls | grep simplesaml | grep -v *tar.gz ) simplesamlphp \
    && rm /var/www/downloaded-simplesamlphp.tar.gz

# Setup nginx
# Copy the nginx configuration files
COPY resources/nginx/nginx.conf /etc/nginx/
# Setup the keys
COPY resources/keys/auth-proxy.chained.cer /etc/pki/nginx/
COPY resources/keys/auth-proxy.key /etc/pki/nginx/private/

# Setup php-fpm
COPY resources/php-fpm/www.conf /etc/php-fpm.d/
RUN chgrp nginx /var/lib/php/session \
    && mkdir /var/www/php

# Setup simplesamlphp
COPY resources/simplesamlphp/config/config.php /var/www/simplesamlphp/config
COPY resources/simplesamlphp/config/authsources.php /var/www/simplesamlphp/config
COPY resources/simplesamlphp/metadata/saml20-idp-remote.php /var/www/simplesamlphp/metadata
# Setup the keys
COPY resources/keys/auth-proxy.cer /var/www/simplesamlphp/cert/
COPY resources/keys/auth-proxy.key /var/www/simplesamlphp/cert/
# Automated Metadata Management 
RUN set -x \
    && chown -R nginx:nginx /var/www/simplesamlphp \
    && touch /var/www/simplesamlphp/modules/cron/enable \
    && touch /var/www/simplesamlphp/modules/metarefresh/enable 
COPY resources/simplesamlphp/modules/module_cron.php /var/www/simplesamlphp/config/
COPY resources/simplesamlphp/modules/config-metarefresh.php /var/www/simplesamlphp/config/

CMD ["/bin/bash"]
