echo "Script de lancement serveur en mode production"
echo -e "  un script init_server, init_server_prod ou all_in_one doit avoir été lancé précédemment\n"

echo "Composition des conteneurs docker."
docker-compose up -d

# Récupération de l'adresse du serveur
grep_result=$(docker inspect $(docker ps -f name=nginx -q) | grep '                    \"IPAddress\":')

grep_result=$(echo $grep_result | cut -d':' -f 2)
IPAddress=${grep_result#*\"}   # remove prefix ending in """
IPAddress=${IPAddress%\"*}   # remove suffix starting with """

echo -e "\n(http://$IPAddress)"

update_commands="
composer update
php app/console doctrine:schema:update ;"

echo -e "\nMise à jour du site"
docker-compose exec php bash -c "$init_commands"
echo "Serveur lancé, adresse d'accès locale : http://"$IPAddress
echo -e "\nAccès aux commandes depuis docker ('exit' pour quitter)"
docker-compose exec php bash

docker-compose down

