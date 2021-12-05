# PostGreceRPG
POSTGRESQL Cnam

## Installation

### Pre-requis
Afin de déployer ce projet sur votre machine en local, il faut que vous ayez installé sur votre machine, une version de PHP 7.4 de préférence, les packages symfony, et enfin: postgresql avec un gestionnaire (Pg admin pour être dans nos conditions).

### Etapes 
Tout d'abord clonnez le repository sur votre machine :
```
git@github.com:Daumas-hugo/PostGreceRPG.git
```
Ensuite allz dans votre dossier et installez les dépendences du projet
```
cd PostGreceRPG
composer install
```
Vous pouvez maintenant lancer votre serveur en local
```
symfony server:start
```
Trouvez votre php.ini et modifiez les lignes (enlever les commentaires ; )
```
Trouvez le php.ini avec : symfony check:requirements 
extension=pdo_pgsql
extension=pgsql
```
Mettez a jour la chaine de connection a postgre avec vos credentials
```
.env mettre les crédentials postgres
```
Et finallement créez et restorez la base avec le fichier SQL fournis depuis pgAdmin
