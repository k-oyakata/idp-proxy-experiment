FROM centos/httpd:latest

RUN set -x \
    && rpm --import /etc/pki/rpm-gpg/RPM-GPG-KEY-CentOS-7 \
    && yum -y update \
    && yum -y install epel-release \
    && yum -y install nodejs npm \
    && mkdir -p /root/websock \
    && cd /root/websock \
    && npm init -y \
    && npm install express socket.io --save

COPY resources/websocket/ /root/websock/

CMD ["/usr/bin/node /root/websock/app.js"]