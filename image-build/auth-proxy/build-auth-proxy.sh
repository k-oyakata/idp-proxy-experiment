#!/bin/bash

OPT=$1

BASE_DIR=$(cd $(dirname $0);cd ../../;pwd)

mkdir -p $BASE_DIR/image-build/idp-proxy/resources/tmp
(cd $BASE_DIR/image-build/idp-proxy/resources/tmp; curl -O http://rpms.famillecollet.com/enterprise/remi-release-7.rpm)
mkdir -p $BASE_DIR/image-build/auth-proxy/resources/keys
cp -p ~/cert/auth-proxy/auth-proxy.chained.cer $BASE_DIR/image-build/auth-proxy/resources/keys/auth-proxy.chained.cer
cp -p ~/cert/auth-proxy/auth-proxy.cer $BASE_DIR/image-build/auth-proxy/resources/keys/auth-proxy.cer
cp -p ~/cert/auth-proxy/auth-proxy.key $BASE_DIR/image-build/auth-proxy/resources/keys/auth-proxy.key

#$BASE_DIR/bin/docker build --no-cache=true -t auth-proxy:latest ./
$BASE_DIR/bin/docker build $OPT -t auth-proxy:latest ./

