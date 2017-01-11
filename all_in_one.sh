#!/bin/sh
echo "Script de d'initialisation du site et de lancement serveur en mode développement"
echo -e "  un script init_server, init_server_prod ou all_in_one doit avoir été lancé précédemment\n"

echo "Composition des conteneurs docker."
#bash -c 'gnome-terminal -x docker-compose up -d' &
docker-compose up -d

# Récupération de l'adresse du serveur
grep_result=$(docker inspect $(docker ps -f name=nginx -q) | grep '                    \"IPAddress\":')
grep_result=$(echo $grep_result | cut -d':' -f 2)
IPAddress=${grep_result#*\"}   # remove prefix ending in """
IPAddress=${IPAddress%\"*}   # remove suffix starting with """

echo -e "\n(http://$IPAddress)"

echo -e "\nNettoyage du cache"
php symfony/app/console cache:clear --env=prod
php symfony/app/console cache:clear --env=dev

#sudo chmod -R 777 symfony/app/cache symfony/app/logs

autorizations_commands="
HTTPDUSER=\`ps axo user,comm | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1\`

sudo setfacl -R -m u:"$HTTPDUSER":rwX -m u:\`whoami\`:rwX var
sudo setfacl -dR -m u:"$HTTPDUSER":rwX -m u:\`whoami\`:rwX var"

#composer install --no-dev --optimize-autoloader;
init_commands="
composer install 
php app/console doctrine:database:create ;
php app/console doctrine:schema:drop --force ;
php app/console doctrine:schema:update --force ;
php app/console doctrine:fixture:load ;
php app/console fos:user:promote root ROLE_ADMIN"

#bash -c " cd symfony ; $init_commands ; cd .."

echo -e "\nAjout des droits aux dossiers logs et cache"
docker-compose exec php bash -c "$autorizations_commands"
echo -e "\nInitialisation du site"
docker-compose exec php bash -c "$init_commands"
echo "Serveur lancé, adresse d'accès locale : http://"$IPAddress
echo -e "\nAccès aux commandes depuis docker ('exit' pour quitter)"
docker-compose exec php bash

docker-compose down

