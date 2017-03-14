#!/bin/bash

OPT=$1

BASE_DIR=$(cd $(dirname $0);cd ../../;pwd)

$BASE_DIR/bin/docker build $OPT -t auth-proxy:latest ./

