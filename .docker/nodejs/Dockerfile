# Specify the Node.js version to use
ARG NODE_VERSION=20
FROM node:${NODE_VERSION}-alpine

# Switch to the root user to perform installation
USER root

# Set the working directory
WORKDIR /srv/sylius

# Install dependencies (including build dependencies)
RUN apk add --no-cache --virtual .build-deps \
    g++ \
    gcc \
    git \
    make \
    python3 \
    py3-pip \
    && apk del .build-deps \