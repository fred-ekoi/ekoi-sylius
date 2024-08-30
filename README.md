
# Installation et Configuration du Projet Sylius

## Prérequis

Assurez-vous d'avoir les éléments suivants installés sur votre machine :
- Docker
- Docker Compose

## Étapes d'installation

1. **Cloner le dépôt :**

   Clonez le dépôt Git en utilisant la commande suivante :

   ```bash
   git clone git@github.com:16h33/sylius.git
   ```

2. **Ouvrir le terminal :**

   Ouvrez votre terminal favori pour exécuter les commandes suivantes.

3. **Vérifier le bon fonctionnement de Docker :**

   Assurez-vous que Docker est correctement installé et fonctionne en exécutant :

   ```bash
   docker --version
   docker-compose --version
   ```

4. **Accéder au répertoire `.docker` :**

   Déplacez-vous dans le répertoire `.docker` du projet :

   ```bash
   cd .docker
   ```

5. **Construire et démarrer les conteneurs :**

   Lancez la construction des conteneurs Docker et démarrez-les en arrière-plan :

   ```bash
   docker-compose up --build -d
   ```

6. **Configurer Composer pour Sylius :**

   Sur le conteneur PHP, exécutez les commandes suivantes pour configurer Composer :

   ```bash
   docker-compose exec php composer config repositories.sylius composer https://sylius.repo.packagist.com/16h33/
   docker-compose exec php composer config --global --auth http-basic.sylius.repo.packagist.com token ac8d4bcd8ed8abe2846fc593ae4099a5b7f5443bd3d17c799397b97b4c85
   ```

7. **Installer les dépendances PHP :**

   Toujours sur le conteneur PHP, installez les dépendances du projet avec Composer :

   ```bash
   docker-compose exec php composer install
   ```

8. **Installer les dépendances Node.js et construire les assets :**

   Sur le conteneur Node.js, installez les dépendances et construisez les assets front-end :

   ```bash
   docker-compose run --rm nodejs npm i
   docker-compose run --rm nodejs npm run build
   ```

9. **Accéder à l'application :**

   Vous pouvez maintenant accéder à l'application via votre navigateur à l'adresse suivante :

   [http://localhost:8080](http://localhost:8080/)

10. **Importer la base de données :**

    Importez le fichier SQL situé à la racine du projet (`sql.sql`) dans votre base de données.

11. **Exécuter les migrations :**

    Depuis le conteneur PHP, exécutez les migrations pour mettre à jour la base de données :

    ```bash
    docker-compose exec php bin/console doctrine:migrations:migrate
    ```

12. **Accéder à l'application finale :**

    L'application devrait maintenant être accessible via :

    [http://localhost](http://localhost)

## Support

Pour toute question ou problème, n'hésitez pas à créer une issue sur le dépôt GitHub.
