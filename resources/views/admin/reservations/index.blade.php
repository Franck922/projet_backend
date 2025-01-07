<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des réservations</title>
    <!-- Lien vers la dernière version de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mb-4">Liste des réservations</h1>
                
                <!-- Bouton pour ajouter une réservation -->
                <div class="mb-3 text-end">
                    <a href="{{ route('admin.reservations.create') }}" class="btn btn-primary">Ajouter une Réservation</a>
                </div>

                <div class="card shadow-sm">
                    <div class="card-body">
                        <!-- Tableau des réservations -->
                        <table class="table table-striped table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Utilisateur</th>
                                    <th>Vol</th>
                                    <th>Sièges</th>
                                    <th>Prix Total</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($reservations as $reservation)
                                    <tr>
                                        <td>{{ $reservation->id }}</td>
                                        <td>{{ $reservation->user->name }}</td>
                                        <td>{{ $reservation->flight->flight_number }}</td>
                                        <td>{{ $reservation->seats }}</td>
                                        <td>{{ $reservation->total_price }}</td>
                                        <td>
                                            <!-- Bouton Modifier -->
                                            <a href="{{ route('admin.reservations.edit', $reservation->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                                            
                                            <!-- Formulaire de suppression -->
                                            <form action="{{ route('admin.reservations.destroy', $reservation->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette réservation ?')">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Aucune réservation trouvée</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-center">
                            {{ $reservations->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Lien vers le script Bootstrap JS (optionnel pour certaines fonctionnalités) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>