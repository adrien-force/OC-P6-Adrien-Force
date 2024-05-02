<h1 align="center">Développement du site de TomTroc</h1>
<p align="center"><i>Projet N°6 de la formation Développeur d'application PHP Symfony
@OpenClassrooms <br> <a href="https://github.com/adrien-force/OC-P6-Adrien-Force/commits?author=adrien-force"><img src="https://img.shields.io/badge/Auteur_:-Adrien_FORCE-orange"></a></i></p>

## 🎯 Table des matières
- [Description du projet](#-description)
- [Installation du projet](#-installation)
- [Utilisation du projet](#-utilisation)
- [Features supplémentaires](#-features-supplémentaires)


## 📄 Description
<br>

Ce projet consiste à développer un site web pour une association nommée TomTroc. 
Cette association a pour but de mettre en relation des personnes souhaitant échanger des livres.
Le site doit permettre aux utilisateurs de s'inscrire, de se connecter, de consulter les annonces, de contacter les autres utilisateurs. 
<br> <br>
## 🛠️ Installation

1. Cloner le projet sur votre machine
```bash
git clone https://github.com/adrien-force/OC-P6-Adrien-Force.git
```

2. Paramétrer votre serveur web pour qu'il pointe sur le dossier racine du projet
<br>


3. Intégrer les tables de la base de données via le fichier : <br> <br>

   - `TomTroc.dev.sql` pour une base de données MySQL de developpement
   - `TomTroc.empty.sql` pour une base de données MySQL vierge
     <br> <br>

## 🔥️ Utilisation

Le projet est un site web développé en PHP, HTML, CSS sans librairie externe.
Le projet git possède une branche `main` et une branche `feature`. <br>
La branche `main` correspond aux demandes initiales du projet. <br>
La branche `feature` correspond aux ajouts supplémentaires du projet.

Le site s'ouvre sur `index.php`. Cette page fait office de routeur et redirige vers les différentes pages du site.
Par defaut, l'utilisateur est redirigé vers la page d'accueil `home.php`.

Il est possible de s'inscrire ou de se connecter avec le compte admin par défaut:
- email: admin@mail.com
- mot de passe: password

Ou avec un compte utilisateur test:
- email: test1/2/3@mail.com
- mot de passe: password

Les annonces sont visibles par tous les utilisateurs, soit par la page `Nos livres à l'échange` ou sur les profils des utilisateurs.

Les utilisateurs peuvent envoyer des messages aux autres utilisateurs via la page `Messagerie`.
<br> <br>

## 🚀 Features supplémentaires

La branche `feature` contient des ajouts supplémentaires au projet initial:
- Ajout d'une page permettant d'ajouter un livre
- Un thème sombre pour le site accessible via un bouton sur la page `Mon compte`
- Plus à venir...

