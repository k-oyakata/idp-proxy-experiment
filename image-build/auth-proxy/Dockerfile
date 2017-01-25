FROM centos:7

# Install packages
RUN set -x \
    && yum -y update \
    && yum -y install epel-release \
    && yum -y install less \
    && yum -y install which \
    && yum -y install gcc \
    && yum -y install make \
    && yum -y install pcre-devel \
    && yum -y install zlib-devel \
    && yum -y install openssl openssl-devel 

# Make & Install luajit
RUN set -x \
    && cd /usr/local/src \
    && curl -O http://luajit.org/download/LuaJIT-2.0.4.tar.gz \
    && tar zxvf LuaJIT-2.0.4.tar.gz \
    && cd LuaJIT-2.0.4 \
    && make PEFIX=/usr/local/luajit \
    && make install PREFIX=/usr/local/luajit

# Download modules
RUN set -x \
    && cd /usr/local/src \
    # NDK 
    && curl -L https://github.com/simpl/ngx_devel_kit/archive/v0.3.0.tar.gz -o ngx_devel_kit-0.3.0.tar.gz \
    && tar xzvf ngx_devel_kit-0.3.0.tar.gz \
    # lua-nginx-module
    && curl -L https://github.com/openresty/lua-nginx-module/archive/v0.10.7.tar.gz -o lua-nginx-module-0.10.7.tar.gz \
    && tar zxvf lua-nginx-module-0.10.7.tar.gz 

ENV LUAJIT_LIB=/usr/local/luajit/lib \
    LUAJIT_INC=/usr/local/luajit/include/luajit-2.0

# Make & Install nginx
RUN set -x \
    && cd /usr/local/src \
    && curl -L -O http://nginx.org/download/nginx-1.9.5.tar.gz \
    && tar zxvf nginx-1.9.5.tar.gz \
    && cd nginx-1.9.5 \
    && ./configure --prefix=/opt/nginx \
       --with-http_ssl_module \
       --with-http_realip_module \
       --with-ld-opt="-Wl,-rpath,/usr/local/luajit/lib" \
       --add-module=../ngx_devel_kit-0.3.0 \
       --add-module=../lua-nginx-module-0.10.7 \
    && make -j2 \
    && make install \
    && mkdir -p /var/log/nginx

# Install php
RUN set -x \
    && yum -y --enablerepo=epel,remi-php70 install php php-fpm php-xml \
    && systemctl enable php-fpm

# Install memcached
RUN set -x \
    && yum -y install memcached \
    && systemctl enable memcached

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
COPY resources/nginx/nginx.conf /opt/nginx/conf/ 
COPY resources/nginx/auth-proxy.conf /opt/nginx/conf/conf.d/
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
