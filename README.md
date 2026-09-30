# Réservation de vols · API Laravel

API REST d'une plateforme de réservation de vols : catalogue des vols, réservations,
paiements et administration. Laravel 11 sur PHP 8.2, authentification par jetons Sanctum.

L'interface qui consomme cette API se trouve dans [projet_frontend](https://github.com/Franck922/projet_frontend).

## Le modèle de données

| Entité | Champs principaux |
|---|---|
| `Flight` | numéro de vol, ville de départ, ville d'arrivée, horaires de départ et d'arrivée, prix, places disponibles |
| `Reservation` | rattachement au vol et à l'utilisateur, état de la réservation |
| `Payment` | rattachement à la réservation, montant, état du règlement |
| `User` | compte, rôle porté par le champ `usertype` |

Le schéma est versionné par migrations, donc l'environnement se reconstruit en une commande.

## Points d'entrée

```
POST   /api/login                        connexion, renvoie un jeton
       /api/users                        ressource complète
PATCH  /api/users/update-role/{id}       changement de rôle
       /api/flights                      ressource complète
       /api/reservations                 ressource complète
GET    /api/reservations-user/{userId}   réservations d'un utilisateur
       /api/payments                     ressource complète
GET    /api/dashboard-stats              indicateurs du tableau de bord
```

Les ressources sont déclarées avec `Route::resource`, donc les sept verbes habituels
répondent sur chacune d'elles.

## Sécurité

**Jetons Sanctum.** L'authentification passe par des jetons personnels plutôt que par une session,
ce qui convient à un client découplé.

**Contrôle des rôles côté serveur.** Un intergiciel `Admin` garde les contrôleurs d'administration.
Masquer un bouton dans l'interface ne protège rien, la vérification est faite à l'arrivée de la requête.

**Validation.** Les requêtes entrantes passent par des classes de validation dédiées avant
d'atteindre la logique métier.

**Protections du cadre.** Requêtes préparées par Eloquent contre les injections SQL,
échappement automatique des sorties dans les vues, jeton CSRF sur les formulaires web,
mots de passe hachés.

## Organisation

```
app/Http/Controllers/Api/     contrôleurs consommés par le client
app/Http/Controllers/Admin/   back-office
app/Http/Middleware/Admin.php contrôle du rôle
app/Models/                   Flight, Reservation, Payment, User
database/migrations/          schéma versionné
routes/api.php                points d'entrée de l'API
```

## Lancer en local

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

---

Franck DEFFO · [Portfolio](https://franck922.github.io/Franck-DEFFO-.github.io/) · [LinkedIn](https://www.linkedin.com/in/franck-deffo)
