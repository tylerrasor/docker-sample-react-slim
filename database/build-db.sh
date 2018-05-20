#!/bin/bash

gunzip titles.tsv.gz;

mv titles.tsv titles.csv;
sed -i 1d titles.csv;
sed -i "s/\t/|/g" titles.csv;
sed -i "s/\"/'/g" titles.csv;
sed -i "s/\\\N//g" titles.csv;

chmod +r titles.csv;

mv init-db.sql /docker-entrypoint-initdb.d/;
mv titles.csv /docker-entrypoint-initdb.d/;