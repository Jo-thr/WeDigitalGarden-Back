# website

Bienvenue sur le répo Gitlab du projet "WebSite" de WeDigital Garden  

Projet réalisé initialisement par:
* Baptiste Gios (bgios@wedigital.garden) - Intégrateur
* Vincent Schlosser (vschlosser@wedigital.garden) - FullStack, principalement sur le front-end
* Mathieu Nibas (mnibas@wedigital.garden) - FullStack, principalement sur le back-end

La Stack technologique est basé sur Laravel avec Nova pour la gestion de son back-office.
Le front tourne quand à lui sous NuxtJS / VueJS, avec une compilation SSR ( pour une optimisation du SEO ).

Le serveur est héberger sur le Scaleway de Wizards ( Administré par Monster ), avec une préprod (siegmeyer) et une production (seath).  
Une CD est présent sur le Jenkins de Monster.

# Setup 

## Docker

Pour lancer les divers contenaires du projet, rendez vous dans le dossier `docker`.
Copier-coller le fichier `.env.example` en `.env` puis éxécuté la commande `docker-compose up` ( possibilité de rajouter la flag ``--build` lors de la première instance ).

## Initialisation du projet

Pensez avant toute chose à initialiser votre fichier `.env` en fonction du fichier `.env.example`.  
Une fois les conteneurs lancés, vous pouvez rentrer dans le conteneur principal avec la commande `docker exec -it wdg-app bash`. 

Une fois dedans, il vous faudra installer les vendors avec la commande `composer install`.  
Le programme vous demander de saisir une clé de hash pour l'application. Veuillez tapper la commande `php artisan key:generate`.  
Pensez à faire un petit `php artisan migrate` pour setup votre base de donnée.

Un `php artisan storage:link` sera indispensable pour la gestion des assets.

## Initialisation de l'utilisateur Nova 

Pour générer votre premier utilisateur sous Nova, il vous faudra saisir la commande `php artisan nova:user`

# Création d'items

## Création d'une nouvelle d'une page / region

Création du template avec la commande : `php artisan pagemanager:template`

Il suffit ensuite de suivre les instructions sur le terminal. **Attention, bien mettre le nom en majuscule** (= même nom que le component mère dans le front).  
Penser à l'ajouter dans la configuration du module pour le rendre utilisable. 

Pour utiliser l'APi avec cette nouvelle page, il suffit de crée un nouveau case dans le switch présent dans la fonction `getPage` du fichier `app/Traits/Page.php`

## Création d'une nouvelle resource Nova 

### Création de la base de donnée. 

La première étape est de créer la migration pour la base de donnée avec `php artisan make:migration NAME` et de suivre la documentation d'Eloquent

### Ajout des droits

Création de la policy avec la commande `php artisan make:policy NAMEPolicy` et de configurer le fichier fraichement créer.  
Ajout des 4 règles dans le fichier de configuration du module `config/nova-permissions.php`  
Création du modele de donnée avec la commande `php artisan make:model Models/NANE` et de le configurer (ajout des implements pour les images, audit, ... table, ...)  
Binding du model avec la policy dans le fichier `app/Providers/AuthServiceProvider.php`  

### Création de la resource Nova

Pour créer la resource Nova, il suffit de faire la commande `php artisan nova:resource NAME` et de setup les champs ( voir doc Nova Laravel ou autres fichiers déjà créés )

### Création de l'API

Il faut générer le controller ( `php artisan make:controller Api/NAMEController`) et de le configurer ( voir les autres controllers )  
Puis de créer les diverses resources associer ( collection et ressource + celles des langues si multilangues ) avec la commande `php artisan make:resource NAMEResource` et `php artisan make:resource NAMECollectionResource -c`  
Rajouter les diverses routes dans le fichier `routes/api.php`  
Créer le case dans le swith de la fonction `getModel` du fichier `app/Traits/Multilanguage.php` pour correctement utiliser la fonction automatique.   

Vous pouvez finir par faire un `php swagger.php` pour lancer le script de mise a jour de la doc API.   