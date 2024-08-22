ARG NODE_VERSION=20
FROM node:${NODE_VERSION}-alpine

USER root


# Copy source files into application directory
COPY --chown=app:app . /app

WORKDIR /srv/sylius

RUN set -eux; \
	apk add --no-cache --virtual .build-deps \
		g++ \
		gcc \
		git \
		make \
		python3 \
		py3-pip \
	;

WORKDIR /srv/sylius