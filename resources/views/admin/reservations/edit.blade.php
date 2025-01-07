<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la réservation</title>
    <!-- Lien vers la dernière version de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mb-4">Modifier la réservation</h1>

                <!-- Formulaire de modification -->
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form action="{{ route('admin.reservations.update', $reservation->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Sélection de l'utilisateur -->
                            <div class="mb-3">
                                <label for="user_id" class="form-label">Utilisateur</label>
                                <select name="user_id" id="user_id" class="form-select" required>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ $user->id == $reservation->user_id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Sélection du vol -->
                            <div class="mb-3">
                                <label for="flight_id" class="form-label">Vol</label>
                                <select name="flight_id" id="flight_id" class="form-select" required>
                                    @foreach($flights as $flight)
                                        <option value="{{ $flight->id }}" {{ $flight->id == $reservation->flight_id ? 'selected' : '' }}>
                                            {{ $flight->flight_number }} - {{ $flight->departure }} → {{ $flight->arrival }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Nombre de sièges -->
                            <div class="mb-3">
                                <label for="seats" class="form-label">Nombre de sièges</label>
                                <input type="number" name="seats" id="seats" class="form-control" value="{{ old('seats', $reservation->seats) }}" required>
                            </div>

                            <!-- Prix total -->
                            <div class="mb-3">
                                <label for="total_price" class="form-label">Prix Total</label>
                                <input type="number" name="total_price" id="total_price" class="form-control" value="{{ old('total_price', $reservation->total_price) }}" required>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">Mettre à jour</button>
                                <a href="{{ route('admin.reservations.index') }}" class="btn btn-secondary">Annuler</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Lien vers le script Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>