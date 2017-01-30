#!/bin/bash

BASE_DIR=$(cd $(dirname $0);cd ../../;pwd)

mkdir -p $BASE_DIR/image-build/idp-proxy/resources/keys
cp -p ~/cert/nbhub.ecloud.nii.ac.jp.chained.cer $BASE_DIR/image-build/idp-proxy/resources/keys/idp-proxy.chained.cer
cp -p ~/cert/nbhub.ecloud.nii.ac.jp.cer $BASE_DIR/image-build/idp-proxy/resources/keys/idp-proxy.cer
cp -p ~/cert/nbhub.ecloud.nii.ac.jp.key $BASE_DIR/image-build/idp-proxy/resources/keys/idp-proxy.key

$BASE_DIR/bin/docker build --no-cache=true -t idp-proxy:latest ./

#$BASE_DIR/bin/docker build -t idp-proxy:latest ./

