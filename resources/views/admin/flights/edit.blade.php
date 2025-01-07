<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Vol</title>
    <!-- Lien vers le CDN de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <h1>Modifier le vol</h1>
    <form action="{{ route('admin.flights.update', $flight->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Méthode PUT pour la mise à jour -->

        <div class="mb-3">
            <label for="flight_number" class="form-label">Numéro de vol</label>
            <input type="text" class="form-control" id="flight_number" name="flight_number"
                   value="{{ old('flight_number', $flight->flight_number) }}" required>
        </div>

        <div class="mb-3">
            <label for="departure_city" class="form-label">Ville de départ</label>
            <input type="text" class="form-control" id="departure_city" name="departure_city"
                   value="{{ old('departure_city', $flight->departure_city) }}" required>
        </div>

        <div class="mb-3">
            <label for="arrival_city" class="form-label">Ville d'arrivée</label>
            <input type="text" class="form-control" id="arrival_city" name="arrival_city"
                   value="{{ old('arrival_city', $flight->arrival_city) }}" required>
        </div>

        <div class="mb-3">
            <label for="departure_time" class="form-label">Heure de départ</label>
            <input type="datetime-local" class="form-control" id="departure_time" name="departure_time"
                   value="{{ old('departure_time', \Carbon\Carbon::parse($flight->departure_time)->format('Y-m-d\TH:i')) }}" required>
        </div>

        <div class="mb-3">
            <label for="arrival_time" class="form-label">Heure d'arrivée</label>
            <input type="datetime-local" class="form-control" id="arrival_time" name="arrival_time"
                   value="{{ old('arrival_time', \Carbon\Carbon::parse($flight->arrival_time)->format('Y-m-d\TH:i')) }}" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Prix (€)</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price"
                   value="{{ old('price', $flight->price) }}" required>
        </div>

        <div class="mb-3">
            <label for="seats_available" class="form-label">Nombre de sièges disponibles</label>
            <input type="number" class="form-control" id="seats_available" name="seats_available"
                   value="{{ old('seats_available', $flight->seats_available) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
<!-- Lien vers le CDN de Bootstrap JS et dépendances -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
