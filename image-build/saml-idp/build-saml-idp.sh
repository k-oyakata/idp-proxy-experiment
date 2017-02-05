#!/bin/bash

OPT=$1

BASE_DIR=$(cd $(dirname $0);cd ../../;pwd)

mkdir -p $BASE_DIR/image-build/saml-idp/resources/tmp
(cd $BASE_DIR/image-build/saml-idp/resources/tmp; curl -O http://rpms.famillecollet.com/enterprise/remi-release-7.rpm)
mkdir -p $BASE_DIR/image-build/saml-idp/resources/keys
cp -p ~/cert/saml-idp/saml-idp.chained.cer $BASE_DIR/image-build/saml-idp/resources/keys/
cp -p ~/cert/saml-idp/saml-idp.cer $BASE_DIR/image-build/saml-idp/resources/keys/
cp -p ~/cert/saml-idp/saml-idp.key $BASE_DIR/image-build/saml-idp/resources/keys/

#$BASE_DIR/bin/docker build --no-cache=true -t saml-idp:1.0 ./
$BASE_DIR/bin/docker build $OPT --rm -t saml-idp:latest ./

