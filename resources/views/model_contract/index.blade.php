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
                    <a href="{{ route('model_contract.create') }}">Ajouter</a>
                    <table class="border">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($models_contracts as $model_contract)
                                <tr>
                                    <td>{{ $model_contract->id }}</td>
                                    <td>{{ $model_contract->name }}</td>
                                    <td>
                                        <ul>
                                            <li>
                                                <a href="{{ route('model_contract.show', $model_contract->id) }}">Voir</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('model_contract.edit', $model_contract->id) }}">Modifier</a>
                                            </li>
                                            <li>
                                                 <form action="{{ route('model_contract.destroy', $model_contract->id) }}" method="POST">
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
