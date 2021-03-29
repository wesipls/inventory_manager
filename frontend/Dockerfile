#DOCKERFILE FOR DEVELOPMENT
#PRODUCTION TODO, ADD NGINX, BUILD APP AND CHANGE ROOT TO /APP/DIST
FROM node:lts-alpine
WORKDIR /app
COPY package*.json ./app/
RUN npm install
COPY . .

CMD ["npm", "run", "serve"]
