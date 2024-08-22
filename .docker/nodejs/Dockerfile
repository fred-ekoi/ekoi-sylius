ARG NODE_VERSION=20
FROM node:${NODE_VERSION}-alpine

RUN useradd -ms /bin/sh -u 1001 app
USER app

# Install dependencies
WORKDIR /app
COPY package.json package-lock.json ./
RUN npm install

# Copy source files into application directory
COPY --chown=app:app . /app

WORKDIR /srv/sylius

RUN set -eux; \
	apk add --no-cache --virtual .build-deps \
		g++ \
		gcc \
		git \
		make \
		python \
	;

WORKDIR /srv/sylius