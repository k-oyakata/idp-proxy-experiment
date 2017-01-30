#!/bin/bash

BASE_DIR=$(cd $(dirname $0);cd ../../;pwd)

$BASE_DIR/bin/go-docker build --no-cache=true -t ubuntu/idp-proxy:latest ./

#$BASE_DIR/bin/go-docker build -t ubuntu/idp-proxy:latest ./

