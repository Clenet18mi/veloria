# VELORIA — Plateforme SaaS de Gestion Hôtelière

VELORIA est une plateforme SaaS moderne destinée aux hôtels indépendants et petites chaînes hôtelières. Elle centralise la gestion des réservations, du housekeeping, de la maintenance et de la relation client.

## 🚀 Installation Rapide (Développement avec Laravel Sail)

Cette procédure suppose que vous avez **Docker** installé sur votre machine.

### 1. Cloner le projet et entrer dans le dossier
```bash
cd veloria
```

### 2. Configurer l'environnement
Copiez le fichier d'exemple et générez la clé de l'application :
```bash
cp .env.example .env
```

### 3. Installer les dépendances PHP
Si vous n'avez pas PHP installé localement, vous pouvez utiliser un conteneur temporaire pour installer Composer :
```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```
*Note : Si vous êtes sur Windows (PowerShell), adaptez les chemins ou utilisez WSL2.*

### 4. Lancer les services (Docker)
Utilisez le Makefile pour simplifier les commandes :
```bash
make up
```
*(Ceci lance `./vendor/bin/sail up -d`)*

### 5. Préparer la base de données
Générez la clé de l'application et lancez les migrations avec les données de test :
```bash
./vendor/bin/sail artisan key:generate
make fresh
```
*(Ceci exécute `php artisan migrate:fresh --seed` via Sail)*

### 6. Installer et lancer le frontend (Vite)
Dans un nouveau terminal :
```bash
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
```

L'application est maintenant accessible sur [http://localhost](http://localhost).

---

## 🛠 Commandes Utiles (Makefile)

Le projet inclut un `Makefile` pour simplifier les tâches courantes :

- `make up` : Démarre les conteneurs Docker (Sail).
- `make down` : Arrête les conteneurs.
- `make migrate` : Exécute les migrations.
- `make fresh` : Réinitialise la base de données et joue les seeders.
- `make seed` : Joue uniquement les seeders.
- `make test` : Lance la suite de tests PHPUnit.
- `make lint` : Lance le linter (Pint/ESLint).

---

## 🏗 Stack Technique

- **Backend** : Laravel 11 (PHP 8.2+)
- **Frontend** : Vue 3 + Inertia.js
- **Styling** : Tailwind CSS
- **Base de données** : MySQL 8
- **Cache & Queues** : Redis (Horizon pour le monitoring)
- **Temps réel** : Laravel Reverb
- **Outils** : Telescope (Debug), Pulse (Monitoring)

---

## 📖 Documentation
- [Cahier des charges](../veloria_cahier_des_charges.md)
