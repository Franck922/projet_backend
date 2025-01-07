<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Paiement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">Modifier un Paiement</h1>

        <form action="{{ route('admin.payments.update', $payment->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="reservation_id" class="form-label">Réservation</label>
                <input type="text" name="reservation_id" class="form-control" value="{{ $payment->reservation->id }}" readonly>
            </div>

            <div class="mb-3">
                <label for="amount" class="form-label">Montant</label>
                <input type="number" name="amount" class="form-control" step="0.01" value="{{ $payment->amount }}" required>
            </div>

            <div class="mb-3">
                <label for="payment_method" class="form-label">Méthode de Paiement</label>
                <input type="text" name="payment_method" class="form-control" value="{{ $payment->payment_method }}" required>
            </div>

            <div class="mb-3">
                <label for="payment_status" class="form-label">Statut</label>
                <select name="payment_status" class="form-select" required>
                    <option value="paid" {{ $payment->payment_status == 'paid' ? 'selected' : '' }}>Payé</option>
                    <option value="pending" {{ $payment->payment_status == 'pending' ? 'selected' : '' }}>En Attente</option>
                    <option value="failed" {{ $payment->payment_status == 'failed' ? 'selected' : '' }}>Échoué</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Sauvegarder les Modifications</button>
            <a href="{{ route('admin.payments.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</body>
</html>
