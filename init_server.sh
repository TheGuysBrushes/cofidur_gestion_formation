echo -e "Script d'initialisation du site en mode développement\n"

echo "Composition des conteneurs docker."
docker-compose up &

echo "..."
sleep 2

echo -e "\nNettoyage du cache"
php symfony/app/console cache:clear --env=prod
php symfony/app/console cache:clear --env=dev

autorizations_commands="
HTTPDUSER=\`ps axo user,comm | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1\`

setfacl -R -m u:"$HTTPDUSER":rwX -m u:\`whoami\`:rwX var
setfacl -dR -m u:"$HTTPDUSER":rwX -m u:\`whoami\`:rwX var"

init_commands="
composer install
php app/console doctrine:database:drop --force ;
php app/console doctrine:database:create ;
php app/console doctrine:schema:update --force ;
php app/console doctrine:fixture:load ;
php app/console fos:user:promote root ROLE_ADMIN"

echo -e "\nAjout des droits aux dossiers logs et cache"
docker-compose exec php bash -c "$autorizations_commands"
echo -e "\nInitialisation du site "
docker-compose exec php bash -c "$init_commands"

docker-compose down

