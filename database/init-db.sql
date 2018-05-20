CREATE TABLE titles(
                        id                      VARCHAR,
                        titleType               VARCHAR,
                        primaryTitle            VARCHAR,
                        originalTitle           VARCHAR,
                        isAdult                 BIT,
                        startYear               INT,
                        endYear                 INT,
                        runtimeMinutes          INT,
                        genres                  VARCHAR
                   );

COPY titles FROM '/docker-entrypoint-initdb.d/titles.csv' delimiter '|' csv;