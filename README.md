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
├── config.php
├── login.php
├── dashboard.php
├── logout.php
├── add_log.php
├── amettredansvotrebasededonnés.sql
├── css/
│   └── style.css
├── js/
│   └── script.js
├── fivem_logger/
│   ├── server.lua
│   └── fxmanifest.lua
└── README.md
