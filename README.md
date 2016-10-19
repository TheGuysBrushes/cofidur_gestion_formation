# cofidur_gestion_formation
Création d'un outil de gestion des formations de l'entreprise Cofidur (projet annuel M2 SILI)

---

##Choix des technologies

1. **Langage :** Php (version 7.0.8)
2. **Framework :** Symfony (version 2.8.12)
3. **Outils complémentaires :** Jenkins ? Travis ?

##À installer :

1. Php
2. Symfony
3. MySQL

##Commandes à exécuter :

### // Lancement du serveur
- `$php ./app/console server:run`

### // Accès à la page principale
- http://localhost:8000/

##Emplacement des fichiers
Les fichiers html affichés sont accessibles dans :
	/cofidur_gestion_formation/app/Resources/views/

Les fichiers controlleurs sont accessibles dans :
	/cofidur_gestion_formation/src/AppCofidurBundle/Controller/

---

##Pages à ajouter :
#Accessible aux opérateurs:
- [ ] Accueil
- [ ] Matrice des compétences
- [ ] Visibilité de l'ensemble des FFO d'un opérateur

#Accessible specifiquement par l'administrateur:
- [ ] Création d'une formation
- [ ] Génération et affichage d'une FFO
- [ ] Ajout d'un opérateur
- [ ] Modification d'un opérateur
- [ ] Visibilité d'un ensemble de FFO par l'administrateur

##Prise en main du framework :
- [x] Mise en place de la BDD + affichages basiques
- [ ] Authentification des opérateurs
- [ ] Lecture de la BDD par l'administrateur
- [ ] Lecture de la BDD par un opérateur

- [ ] Modification de la BDD par l'administrateur (Infos sur le personnel, FFO etc)
- [ ] Ajout des nouvelles compétences disponibles après l'ajout d'une nouvelle formation
- [ ] Actualisation de la matrice des compétences suite à la validation d'une FFO
- [ ] Proposition de formation lorsqu'une compétence va venir à manquer (message à envoyer à l'administrateur à propos des départs en retraite proches)
