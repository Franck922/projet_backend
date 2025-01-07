<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <P><a href="users" class="btn btn-primary">Gestion des Utilisateurs</a></P>
                    <P><a href="flights" class="btn btn-primary">Gestion des Vols</a></P>
                    <p><a href="reservations" class="btn btn-primary">Gestion des réservations</a></p>
                    <p><a href="payments" class="btn btn-primary">Gestion des paiements</a></p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
