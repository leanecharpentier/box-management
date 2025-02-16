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
                    <a href="{{ route('contract.create') }}">Ajouter</a>
                    <table class="border">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom du box</th>
                                <th>Nom du locataire</th>
                                <th>Loyer (€/mois)</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contracts as $contract)
                                <tr>
                                    <td>{{ $contract->id }}</td>
                                    <td>{{ $contract->box->name }}</td>
                                    <td>{{ $contract->tenant->lastname . " " . $contract->tenant->firstname }}</td>
                                    <td>{{ $contract->monthly_price }}</td>
                                    <td>
                                        <ul>
                                            <li>
                                                <a href="{{ route('contract.show', $contract->id) }}">Voir</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('contract.edit', $contract->id) }}">Modifier</a>
                                            </li>
                                            <li>
                                                <form action="{{ route('contract.destroy', $contract->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">Supprimer</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
