FROM node:latest

WORKDIR /app
COPY . /app

ENV PATH /app/node_modules/.bin:$PATH

RUN npm install --silent && npm install react-scripts -g --silent

CMD yarn start