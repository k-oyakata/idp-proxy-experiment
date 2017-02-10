#!/bin/bash

OPT=$1

BASE_DIR=$(cd $(dirname $0);cd ../../;pwd)

#mkdir -p $BASE_DIR/image-build/web/resources/tmp
#(cd $BASE_DIR/image-build/web/resources/tmp; curl -O #http://rpms.famillecollet.com/enterprise/remi-release-7.rpm)

$BASE_DIR/bin/docker build $OPT -t websocket:latest ./
