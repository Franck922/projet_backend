<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une réservation</title>
    <!-- Lien vers la dernière version de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">Créer une réservation</h1>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.reservations.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="user_id" class="form-label">Utilisateur</label>
                        <input type="text" name="user_id" id="user_id" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="flight_id" class="form-label">Vol</label>
                        <select name="flight_id" id="flight_id" class="form-select" required>
                            @foreach ($flights as $flight)
                                <option value="{{ $flight->id }}">
                                    {{ $flight->flight_number }} - {{ $flight->departure_city }} à {{ $flight->arrival_city }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="seats" class="form-label">Nombre de sièges</label>
                        <input type="number" name="seats" id="seats" class="form-control" min="1" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Réserver</button>
                </form>
            </div>
        </div>
    </div>

