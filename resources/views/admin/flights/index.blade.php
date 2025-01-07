<h1 class="my-4">Rechercher un vol</h1>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<form action="{{ route('admin.flights.search') }}" method="GET" class="mb-4">
    <div class="row">
        <!-- Recherche simple -->
        <div class="col-md-3">
            <input type="text" name="keyword" class="form-control" placeholder="Numéro de vol, Ville..." value="{{ request('keyword') }}">
        </div>

        <!-- Filtres avancés -->
        <div class="col-md-2">
            <input type="text" name="departure_city" class="form-control" placeholder="Ville de départ" value="{{ request('departure_city') }}">
        </div>
        <div class="col-md-2">
            <input type="text" name="arrival_city" class="form-control" placeholder="Ville d'arrivée" value="{{ request('arrival_city') }}">
        </div>
        <div class="col-md-2">
            <input type="date" name="departure_date" class="form-control" value="{{ request('departure_date') }}">
        </div>
        <div class="col-md-2">
            <input type="number" name="max_price" class="form-control" placeholder="Prix max" value="{{ request('max_price') }}">
        </div>

        <!-- Bouton de recherche -->
        <div class="col-md-1">
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </div>
    </div>
</form>
<h1 class="my-4">Liste des Vols</h1>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<!-- Bouton Ajouter un vol -->
<a href="{{ route('admin.flights.create') }}" class="btn btn-primary">Ajouter un Vol</a>

<!-- Tableau des utilisateurs -->
<table class="table table-bordered table-striped table-hover">
    <thead class="table-dark">
        <tr>
                <th>Numéro de vol</th>
                <th>Ville de départ</th>
                <th>Ville d'arrivée</th>
                <th>Heure de départ</th>
                <th>Heure d'arrivée</th>
                <th>Prix</th>
                <th>Sièges disponibles</th>
                <th>Actions</th>
        </tr>
    </thead>
    <tbody>
            @forelse ($flights as $flight)
                <tr>
                    <td>{{ $flight->flight_number }}</td>
                    <td>{{ $flight->departure_city }}</td>
                    <td>{{ $flight->arrival_city }}</td>
                    <td>{{ $flight->departure_time }}</td>
                    <td>{{ $flight->arrival_time }}</td>
                    <td>{{ $flight->price }}</td>
                    <td>{{ $flight->seats_available }}</td>
                    <td>
                         <!-- Bouton Modifier -->
                        <a href="{{ route('admin.flights.edit', $flight->id) }} " class="btn btn-warning">Modifier</a>
                        <!-- Formulaire Supprimer -->
                        <form action="{{ route('admin.flights.destroy', $flight->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">Aucun vol trouvé</td>
                </tr>
            @endforelse
        </tbody>
    </table>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


