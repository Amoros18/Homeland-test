Database file : /homeland.sql
Vendor file : /vendor.zip

##### Procedure d'installation 

# Installation des dependances :
 - composer install
 - npm install

# Generation de la cle
 - php artisan key:generate

# migration de la base de donnees
 - utiliser le fichier de base de donnne homeland.sql contenant le schema de la bd et quelques enregistrements

 # Installation des composent front-end
   - compresser le fichier vendor et le mettre dans le repertoire : /public/assets/template/vendor

# Demarrage du serveur
 - php artisan serve

