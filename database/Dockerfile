FROM postgres:latest as seeded

WORKDIR /db
COPY . /db

# Grab some dummy data from IMDB. Could be from nexus, or mock, or whatever
ADD https://datasets.imdbws.com/title.basics.tsv.gz /db/titles.tsv.gz

RUN /db/build-db.sh



FROM postgres:latest

COPY --from=seeded /docker-entrypoint-initdb.d/ /docker-entrypoint-initdb.d/

CMD ["postgres"]
EXPOSE 5432