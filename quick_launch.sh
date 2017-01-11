echo "Script de lancement serveur en mode production"
echo -e "  un script init_server, init_server_prod ou all_in_one doit avoir été lancé précédemment\n"

echo "Composition des conteneurs docker."
docker-compose up -d

# Récupération de l'adresse du serveur
grep_result=$(docker inspect $(docker ps -f name=nginx -q) | grep '                    \"IPAddress\":')

grep_result=$(echo $grep_result | cut -d':' -f 2)
IPAddress=${grep_result#*\"}   # remove prefix ending in """
IPAddress=${IPAddress%\"*}   # remove suffix starting with """

echo -e "\nSite non mis à jour"
echo "Serveur lancé, adresse d'accès locale : http://"$IPAddress
echo -e "\n('Ctrl+C' pour quitter)"

PID=$!
trap 'docker-compose down; exit' 2

while true; do sleep 1h; done;

