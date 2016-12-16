# Application web de gestion des formations de Cofidur EMS
Création d'un outil de gestion des formations de l'entreprise Cofidur (projet annuel M2 SILI)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/f8744b5c39a7407a965fe3c1b7851c78)](https://www.codacy.com/app/flodavid/cofidur_gestion_formation?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=TheGuysBrushes/cofidur_gestion_formation&amp;utm_campaign=Badge_Grade) [![SensioLabsInsight](https://insight.sensiolabs.com/projects/cc5f88fb-2df6-438d-99f2-bea76cbb2653/mini.png)](https://insight.sensiolabs.com/projects/cc5f88fb-2df6-438d-99f2-bea76cbb2653)
---

##Choix des technologies

1. **Langage :** Php (version 7.0.8)
2. **Framework :** Symfony (version 2.8.12)
3. **Outils complémentaires :** Codacy, Jenkins ? Travis ?

##À installer :

1. Php
2. Symfony
3. MySQL
4. Apache

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

#Pages à ajouter :
##Accessible aux opérateurs:
- [ ] Accueil
- [ ] Matrice des compétences
- [ ] Visibilité de l'ensemble des formations d'un opérateur

##Accessible specifiquement par l'administrateur:
- [x] Création d'une formation
- [ ] Génération et affichage d'une FFO
- [x] Ajout d'un opérateur
- [x] Modification d'un opérateur
- [x] Visibilité d'un ensemble de formations par l'administrateur

#Prise en main du framework :
- [x] Mise en place de la BDD + affichages basiques
- [x] Authentification des opérateurs
- [ ] Lecture de la BDD par l'administrateur
- [ ] Modification de la BDD par l'administrateur (Infos du personnel, formations etc)
- [ ] Lecture de ses informations par un opérateur

# Fonctionnalités :
- [ ] Ajout des nouvelles compétences disponibles après l'ajout d'une nouvelle formation
- [ ] Actualisation de la matrice des compétences suite à la validation d'une formation
- [ ] Proposition de formation lorsqu'une compétence va venir à manquer (message à envoyer à l'administrateur à propos des départs en retraite proches)

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/cc5f88fb-2df6-438d-99f2-bea76cbb2653/big.png)](https://insight.sensiolabs.com/projects/cc5f88fb-2df6-438d-99f2-bea76cbb2653)
