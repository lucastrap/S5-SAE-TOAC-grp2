# SAE S5 grp2 TOAC

![TOAC Triathlon](./Images_Site/index_top.jpg)

Latest release of the project : [Latest release](https://github.com/lucastrap/S5-SAE-TOAC-grp2/releases/tag/v4.0)

Project presentation : [Toac Video](https://www.youtube.com/watch?v=hTjv_Lp5zr4)

## The Team

### Initials students
- [Luca Straputicari](https://github.com/lucastrap)
- [Thomas Deyemere](https://github.com/bsct-tormod)
- [Matéo Pepin](https://github.com/SOLUPRED3)
- [Hai Son Dang](https://github.com/haisondang)

### Apprenticeship students
- [Olivier Recher](https://github.com/OlivierRecher)
- [Thomas Masin](https://github.com/caerroff)
- [Hugo Monté](https://github.com/hugomonte)
- [Mohamed Kerrouche](https://github.com/Fiujy)



## Installation

Once the project has been cloned, you have to install the dependencies (not commited in the github)

(Pour la SAE 5 groupe ANALYSE = > Si vous rencontrez un probleme lors de l'installation contactez moi : lucastrap@live.fr)

Install the dependecies (linux) : 
```
apt update
apt install composer
apt install npm
apt install docker
apt install php
```

In the symfony directory:
```
composer install
npm i
```

Then you can setup the database.
In the symfony directory, create a .env.local file, and write your database configuration, like so:
```
DATABASE_URL="mysql://root:password@127.0.0.1:3300/sae_toac?charset=utf8mb4"
```

You can then start the docker, in the docker folder
```
docker compose up -d
```
The database is accessible on the port 3300

Once done, go back to the Symfony folder and run the following:
```
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

That's it, the setup is complete !
You can launch the project with the following, from the symfony folder:
```
php -S localhost:3000 -t public
npm run watch
```

## Deployement

The server requirements are the following :
```
php php-intl php-mysql npm
```

If using Apache :
```
apache2 php-fpm libapache2-mod-fcgid
```

If using MariaDB on the server :
```
mariadb
```

Otherwise with docker:
```
docker
```

Once PHP has been enable with *a2enmod*, you can deploy the application
You can follow the symfony deployement manual [here](https://symfony.com/doc/current/setup/web_server_configuration.html)

Once done, you'll have to install a mariadb or mysql database on the server, and change the .env accordingly (with the user:password and the correct url and port)


## Project Context

This GitHub repository has been created for the [SAE5.A.01](https://webetud.iut-blagnac.fr/course/view.php?id=1131) project.

### If you wish to access our current version: [TOAC Website](https://lucastrap.github.io/S5-SAE-TOAC-grp2/)

### Description

Our mission is to improve the TOAC Triathlon club website by implementing additional features to enhance user experience. Here is the existing website (link: [TOAC Triathlon](https://half.toac-triathlon.com/)), which is already online but requires improvements and new features to meet the client's needs. Our contact person for this project is [Laurène Ronfort](https://fr.linkedin.com/in/laurene-ronfort).

### Objectives

- Have a primarily scroll-based website with a parallax effect.
- Provide solutions to the client to improve website SEO.
- Simplify the website's structure.
- Train the TOAC Triathlon team in website maintenance.
- Integrate the Instagram feed from the [TOAC page](https://www.instagram.com/toactriathlon/).

### Current Project Progress:

[█████████████████████████████████████████████░░] 95%

### Here is a slideshow presenting the client and their needs: [TOAC Slideshow](https://docs.google.com/presentation/d/19AGVjNUYI3qM5f7slZo5BkiuPfHRaJR4KTdoPo22Uow/edit#slide=id.g27b0f7cac84_1_155)

## Repository Structure

We work using the agile method, in one-week sprints.

```
├── Project TOAC
│ ├── Images_Site
│ ├── code
│ ├── docker
│ ├── documents
│ └── symfony
│
└── README.md
```

Project Phase 1: [Phase 1](https://github.com/lucastrap/S5-SAE-TOAC-grp2/issues?q=is%3Aopen+is%3Aissue+milestone%3A%22Phase+1%22)

Project Phase 2: [Phase 2](https://github.com/lucastrap/S5-SAE-TOAC-grp2/issues?q=is%3Aopen+is%3Aissue+milestone%3A%22Phase+2%22)

Project Phase 3: [Phase 3](https://github.com/lucastrap/S5-SAE-TOAC-grp2/issues?q=is%3Aopen+is%3Aissue+milestone%3A%22Phase+3%22)


## Useful Links

- Current version of [TOAC Website](https://half.toac-triathlon.com/)
- Our current version of [TOAC Website](https://lucastrap.github.io/S5-SAE-TOAC-grp2/)

## Documents
- [Technical Document](./documents/documentation_technique.adoc)
- [Existing Analysis](./documents/AnalyseExistant.pdf)

#### Final Reports

- [Mohamed Kerrouche Report](./documents/rapportsAlternants/KerroucheMohamedToec.pdf)
- [Thomas Masin Report](./documents/rapportsAlternants/MasinThomasToec.pdf)
- [Olivier Recher Report](./documents/rapportsAlternants/RecherOlivierToac.pdf)
- [Hugo Monte Report](./documents/rapportsAlternants/MonteHugoToac.pdf)
