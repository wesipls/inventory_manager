#DOCKERFILE FOR DEVELOPMENT
#PRODUCTION TODO, ADD NGINX, BUILD APP AND CHANGE ROOT TO /APP/DIST
FROM node:lts-alpine
WORKDIR /app
COPY package*.json ./
RUN npm install && npm i @vue/cli-service
COPY . .

CMD ["npm", "run", "serve"]
