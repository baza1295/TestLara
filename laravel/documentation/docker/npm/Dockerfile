FROM node:10.12-alpine

RUN apk add --update --no-cache \
    coreutils \
    bash

WORKDIR /app

RUN npm i -g \
    swagger-cli \
    api2html

COPY docker-entrypoint.sh /usr/local/bin/

RUN chmod 755 /usr/local/bin/docker-entrypoint.sh \
    && ln -s /usr/local/bin/docker-entrypoint.sh /

#RUN chown -R app:app /usr/local/bin/docker-entrypoint.sh

ENTRYPOINT ["docker-entrypoint.sh"]





