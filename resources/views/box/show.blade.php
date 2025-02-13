<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2>Info sur le box</h2>
                    <ul>
                        <li>Nom : {{ $box->name }}</li>
                        <li>Adresse : {{ $box->address . " " . $box->code . " " .  $box->city }}</li>
                        <li>Loyer (€/mois)  : {{ $box->rent }}</li>
                    </ul>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($box->tenant)
                    <h2>Info sur le locataire</h2>
                    <ul>
                        <li>Nom : {{ $box->tenant->lastname . ' ' . $box->tenant->firstname }}</li>
                        <li>Numéro de téléphone : {{ $box->tenant->phone }}</li>
                        <li>Adesse mail : {{ $box->tenant->email }}</li>
                        <li>Depuis le : {{ $box->tenant->start_date }}</li>
                    </ul>
                    <ul>
                        <li>Modifier le locataire</li>
                        <li>Supprimer le locataire</li>
                    </ul>
                    @else
                    <p>Pas de locataire</p>
                    <a href="{{ route('tenants.create', ['box_id' => $box->id]) }}">Ajouter un locataire</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
