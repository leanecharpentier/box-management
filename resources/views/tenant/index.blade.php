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
                    <a href="{{ route('tenant.create') }}">Ajouter</a>
                    <table class="border">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom de famille</th>
                                <th>Prénom</th>
                                <th>Adresse mail</th>
                                <th>Numéro de téléphone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tenants as $tenant)
                                <tr>
                                    <td>{{ $tenant->id }}</td>
                                    <td>{{ $tenant->lastname }}</td>
                                    <td>{{ $tenant->firstname }}</td>
                                    <td>{{ $tenant->email }}</td>
                                    <td>{{ $tenant->phone }}</td>
                                    <td>
                                        <ul>
                                            <li>
                                                <a href="{{ route('tenant.show', $tenant->id) }}">Voir</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('tenant.edit', $tenant->id) }}">Modifier</a>
                                            </li>
                                            <li>
                                                 <form action="{{ route('tenant.destroy', $tenant->id) }}" method="POST">
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
