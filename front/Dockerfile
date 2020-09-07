FROM node:12.5.0

ENV HOME="/daily-report/app" \
    LANG=C.UTF-8 \
    TZ=Asia/Tokyo 

WORKDIR ${HOME}

RUN apt-get update && \
    apt-get -y upgrade && \
    npm install -g npm && \
    npm install -g create-nuxt-app && \
    npm install -g @vue/cli

ENV HOST 0.0.0.0
EXPOSE 3000
