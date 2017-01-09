#!/bin/sh

echo "Ajout des droits aux dossier logs et cache"
sudo chmod -R 666 symfony/app/cache symfony/app/logs

echo "Composition des conteneurs docker."
echo "Pour stopper l'exécution, exécutez la comm&ande 'fg', puis Ctrl+C"
#bash -c 'gnome-terminal -x docker-compose up -d' &
docker-compose up -d &

grep_result=$(docker inspect $(docker ps -f name=nginx -q) | grep '                    \"IPAddress\":')

grep_result=$(echo $grep_result | cut -d':' -f 2)
IPAddress=${grep_result#*\"}   # remove prefix ending in """
IPAddress=${IPAddress%\"*}   # remove suffix starting with """

echo "Adresse d'accès locale : http://"$IPAddress

docker-compose exec php bash

