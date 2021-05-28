#!/bin/bash
echo "welcome"
ls
echo -e "e111\n" | sudo -S sudo service  apache2 stop
cd laradock
docker-compose up -d nginx postgres pgadmin mailhog
cd ../
echo "this is the whole list of dir"
echo "docker inspect -f '{{range.NetworkSettings.Networks}}{{.Gateway}}{{end}}' laradock_pgadmin_1"