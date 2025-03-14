# FiveM Logger & Dashboard

Ce projet fournit un système complet pour la gestion et l'affichage des logs de votre serveur FiveM. Il combine :

- **Un dashboard web moderne en Dark Mode** développé en PHP pour visualiser les logs.
- **Un script Lua avancé** qui capte plusieurs événements (connexion, déconnexion, décès, items ajoutés, etc.) et envoie les logs vers un endpoint web avec une gestion de file d'attente et des tentatives de ré-envoi.

---

## Fonctionnalités

- **Dashboard Web Sécurisé**  
  - Système de connexion avec authentification.
  - Affichage des logs dans une interface moderne et épurée en Dark Mode.
  - Séparation claire du CSS et du JavaScript pour faciliter les personnalisations.

- **Endpoint d'Envoi de Logs**  
  - Script PHP `add_log.php` qui reçoit et enregistre les logs envoyés depuis le serveur FiveM.

- **Script Lua pour FiveM**  
  - Capture des événements importants (connexion, déconnexion, décès, ajout d'items, etc.).
  - Utilisation d'une file d'attente pour garantir l'envoi des logs même en cas d'erreur de connexion.
  - Réessai automatique de l'envoi toutes les 5 secondes.

---

## Structure du Projet

/votre-projet
├── config.php # Configuration de la connexion à la BDD et gestion de la session 
├── login.php # Page de connexion utilisateur 
├── dashboard.php # Interface dashboard affichant les logs 
├── logout.php # Déconnexion de l'utilisateur 
├── add_log.php # Endpoint pour recevoir les logs via POST 
├── amettredansvotrebasededonnés.sql # SQL a mettre dans votre base de données 
├── css/ 
│ └── style.css # Feuille de style en Dark Mode 
├── js/ │ 
└── script.js # Fichier JavaScript pour interactions éventuelles 
└── fivem/ # Ressource FiveM pour la gestion des logs 
├── server.lua # Script Lua avancé pour capturer et envoyer les logs 
└── fxmanifest.lua # Manifest pour déclarer la ressource sur FiveM


---

## Installation et Configuration

### 1. Mise en place de l'interface Web

#### a. Base de données

- Créez une base de données MySQL (par exemple, `fivem_logs`) et exécutez le script SQL amettredansvotrebasededonnés.sql

  
b. Configuration du projet
Mettez à jour le fichier config.php avec vos identifiants de connexion à la base de données.
Placez l'ensemble des fichiers PHP, CSS et JS sur votre serveur web disposant de PHP.
2. Intégration avec FiveM
a. Déploiement du Script Lua
Placez le dossier fivem_logger dans le répertoire des ressources de votre serveur FiveM.
Dans le fichier fivem_logger.lua, modifiez la variable httpEndpoint pour pointer vers l'URL de votre fichier add_log.php (ex. : http://votre-domaine.com/add_log.php).
b. Configuration du serveur FiveM
Ajoutez la ressource dans votre fichier server.cfg :

`ensure fivem_logger` 
Redémarrez votre serveur FiveM pour charger la ressource.

Utilisation
Connexion et Visualisation des Logs

Accédez à la page login.php de votre dashboard web.
Connectez-vous avec vos identifiants (par exemple, admin).
Consultez les logs en temps réel dans dashboard.php.
Envoi Automatique des Logs

Le script Lua capte automatiquement les événements (connexion, déconnexion, décès, ajout d'items, etc.) sur votre serveur FiveM.
Les logs sont envoyés via HTTP POST à add_log.php et enregistrés dans la base de données.
En cas d'échec de l'envoi, le système réessaye toutes les 5 secondes grâce à une file d'attente intégrée.
Personnalisation & Sécurité
Sécurité :
Pour une meilleure sécurité en production, remplacez md5() par password_hash() et password_verify(), et envisagez d'ajouter des vérifications supplémentaires sur les entrées utilisateur.

Évolutivité :
Le système est conçu pour être facilement extensible. Vous pouvez ajouter d'autres hooks dans le script Lua pour capturer des événements spécifiques ou enrichir le dashboard avec des fonctionnalités supplémentaires.

License
Ce projet est distribué sous licence MIT. Vous êtes libre de le modifier et de le redistribuer.

Contact
Pour toute question ou suggestion, veuillez ouvrir une issue sur le dépôt ou contacter le mainteneur du projet.


---

Vous disposez ainsi de l'intégralité du projet. N'oubliez pas d'adapter les paramètres (identifiants de base de données, URL de l'endpoint, etc.) en fonction de votre environnement de production.

