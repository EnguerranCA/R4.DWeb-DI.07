# TP Symfony

Si c'est la première séance, commencez par lire le TP1 en passant par le lien un peu plus bas. Sinon, suivez les instructions suivantes pour relancer votre application Symfony.

## Lancer l'application
Vérifiez que Docker Desktop est lancé en cherchant son icône dans la barre de tâche. Si vous ne la trouvez pas, ouvrez l'application et attendez que tout soit opérationnel.

Ouvrez VS Code, connectez-vous à votre Ubuntu avec WSL (bouton bleu avec les doubles flèches en bas à droite), puis ouvrez le dossier contenant votre application.

Lancer l'environnement Docker : installer l'extension "Docker" pour VS Code si ce n'est pas déjà fait, faites un clic droit sur le fichier docker-compose.yml, puis "Compose Up". Vous pouvez aussi ouvrir un terminal dans le dossier du projet, et faire un `docker compose up -d`.

Installer les dépendances nécessaires : ouvrez un terminal dans le conteneur "tp-symfony-php" à partir de VS Code (Icône Docker à gauche, clic droit sur le conteneur, puis "Attach Shell") et faites un `composer install`.

Vérifiez que vous accédez à votre application: [http://localhost:8787](http://localhost:8787).

## Versionner votre travail
Il est très important de versionner vos fichiers régulièrement, afin de pouvoir facilement sauvegarder les différents versions de votre projet. En pratique, cela se traduit par faire des "commits" réguliers grâce à Git, en faisant des "push" sur votre repository GitHub.

**Pensez à commit la version de votre projet au moins une fois en fin de séance!**

Pour faire un commit:
S'il y a besoin, commencez par mettre à jour votre Fork avec les derniers commits du repository de base. Pour cela, allez sur votre repository sur GitHub, puis faites "Sync Fork" -> "Update branch".

Ensuite exécutez ces commandes:
```
# Positionnez-vous dans le répertoire du projet si ce n'est pas déjà fait
cd R4.DWeb-DI.07/

# Faites le commit (vous pouvez personnaliser le message entre guillemets)
git add .
git commit -m "Nouvelle version du projet" 

# Mettez à jour votre repository local avec la dernière version du repository distant
git fetch
git rebase

# Mettez à jour le repository sur GitHub
git push -u
```

## Liens
[TP1 : Introduction à Symfony](https://docs.google.com/document/d/1p57bF8mDKqiQ3j7rnpXmQ3zNeGixdrL8mB9-7ei4xPw/edit?usp=sharing)

[TP2 : Symfony / Twig](https://docs.google.com/document/d/11uuAOaOj0v4lq472WgB8HtH0jFywj6eqPpf_MF6erPA/edit?usp=sharing)

[TP3 : Symfony / Database as a Service](https://docs.google.com/document/d/1cR5Er7pTwAj1ihKRMcsArq_EEaEUslYvOdaPq20NPmY/edit?usp=sharing)
