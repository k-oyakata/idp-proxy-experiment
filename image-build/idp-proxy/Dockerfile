FROM docker.io/centos:7

# Install packages
COPY resources/tmp/remi-release-7.rpm /tmp/
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
    && rpm -Uvh /tmp/remi-release-7.rpm \ 
    && rm /tmp/remi-release-7.rpm \
    #&& yum -y install http://rpms.famillecollet.com/enterprise/remi-release-7.rpm \
    && rpm --import /etc/pki/rpm-gpg/RPM-GPG-KEY-remi \
    && yum -y install --enablerepo=remi-php56 composer \
    && yum -y install --enablerepo=remi-php56 php php-fpm php-xml php-mcrypt \
    && systemctl enable php-fpm \
    # Install simplesamlphp
    && cd /var/www \
    && curl -Lo downloaded-simplesamlphp.tar.gz https://simplesamlphp.org/download?latest \
    && tar xvfz downloaded-simplesamlphp.tar.gz \
    && mv $( ls | grep simplesaml | grep -v *tar.gz ) simplesamlphp \
    && rm /var/www/downloaded-simplesamlphp.tar.gz \
    && composer require niif/simplesamlphp-module-attributeaggregator:1.*

# Setup nginx
# Copy the nginx configuration files
COPY resources/nginx/nginx.conf /etc/nginx/
COPY resources/nginx/idp-proxy.conf /etc/nginx/conf.d/
# Setup the keys
COPY resources/keys/idp-proxy.chained.cer /etc/pki/nginx/
COPY resources/keys/idp-proxy.key /etc/pki/nginx/private/

# Setup php-fpm
COPY resources/php-fpm/www.conf /etc/php-fpm.d/
RUN chgrp nginx /var/lib/php/session

# Setup simplesamlphp
COPY resources/simplesamlphp/config/config.php /var/www/simplesamlphp/config
COPY resources/simplesamlphp/config/authsources.php /var/www/simplesamlphp/config
COPY resources/simplesamlphp/metadata/saml20-idp-hosted.php /var/www/simplesamlphp/metadata
RUN set -x \
    && chown -R nginx:nginx /var/www/simplesamlphp
# Setup the keys
COPY resources/keys/idp-proxy.cer /var/www/simplesamlphp/cert/
COPY resources/keys/idp-proxy.key /var/www/simplesamlphp/cert/
# Automated Metadata Management
#RUN set -x \
#    && touch /var/www/simplesamlphp/modules/cron/enable \
#    && touch /var/www/simplesamlphp/modules/metarefresh/enable
#COPY resources/simplesamlphp/modules/module_cron.php /var/simplesamlphp/config/
#COPY resources/simplesamlphp/modules/config-metarefresh.php /var/simplesamlphp/config/

CMD ["/bin/bash"]
