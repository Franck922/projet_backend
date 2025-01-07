<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Vol</title>
    <!-- Lien vers le CSS de Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <h1 class="my-4 text-center">Ajouter un Vol</h1>
        <form action="{{ route('admin.flights.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="flight_number" class="form-label">Numéro de vol</label>
                <input type="text" name="flight_number" id="flight_number" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="departure_city" class="form-label">Ville de départ</label>
                <input type="text" name="departure_city" id="departure_city" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="arrival_city" class="form-label">Ville d'arrivée</label>
                <input type="text" name="arrival_city" id="arrival_city" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="departure_time" class="form-label">Heure de départ</label>
                <input type="datetime-local" name="departure_time" id="departure_time" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="arrival_time" class="form-label">Heure d'arrivée</label>
                <input type="datetime-local" name="arrival_time" id="arrival_time" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Prix</label>
                <input type="number" name="price" id="price" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="seats_available" class="form-label">Sièges disponibles</label>
                <input type="number" name="seats_available" id="seats_available" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Ajouter</button>
        </form>
    </div>

    <!-- Script de Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0XVtD9p9LwYf6OPhkGnlF4VA5YauXzHqP9pAzRe68Lf0mP5A" crossorigin="anonymous"></script>
</body>

</html>
