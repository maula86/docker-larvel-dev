#!/usr/bin/env bash

mysql --user=root --password="$MYSQL_ROOT_PASSWORD" <<-EOSQL
    CREATE DATABASE IF NOT EXISTS testing;
    CREATE DATABASE IF NOT EXISTS testinglagi;
    GRANT ALL PRIVILEGES ON \`testing%\`.* TO '$MYSQL_USER'@'%';
    GRANT ALL PRIVILEGES ON \`testinglagi%\`.* TO '$MYSQL_USER'@'%';
EOSQL