#!/bin/bash

BASE_DIR=$(cd $(dirname $0);cd ../../;pwd)

#$BASE_DIR/bin/go-docker build --no-cache=true -t idp-proxy:1.0 ./

$BASE_DIR/bin/go-docker build -t idp-proxy:1.0 ./

