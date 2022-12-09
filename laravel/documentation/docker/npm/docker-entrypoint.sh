#!/bin/bash
set -e

green='\033[0;32m'
purple='\033[0;35m'
nc='\033[0m' #no color

ls -la
swagger-cli bundle ./documentation/api/openapi.yaml --outfile ./documentation/api/apidoc.yaml --type yaml
api2html -o ./documentation/api/index.html -l shell,http,javascript -s -S -c ./documentation/api/0.jpg ./documentation/api/apidoc.yaml
