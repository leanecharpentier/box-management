<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des locataires') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('tenant.create') }}" class="inline-block mb-4 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-300">
                Ajouter un locataire
            </a>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
                @foreach($tenants as $tenant)
                    <div class="bg-white shadow-lg rounded-lg p-6 hover:bg-blue-100 transition duration-300">
                        <h3 class="font-semibold text-xl text-gray-900">{{ $tenant->lastname }} {{ $tenant->firstname }}</h3>
                        <p class="text-gray-700">📧 {{ $tenant->email }}</p>
                        <p class="text-gray-700">📞 {{ $tenant->phone }}</p>
                        <div class="mt-4 flex gap-2">
                            <a href="{{ route('tenant.show', $tenant->id) }}" class="px-4 py-2 bg-green-500 text-black rounded-md hover:bg-green-600 transition duration-300">
                                Voir
                            </a>
                            <a href="{{ route('tenant.edit', $tenant->id) }}" class="px-4 py-2 bg-yellow-500 text-black rounded-md hover:bg-yellow-600 transition duration-300">
                                Modifier
                            </a>
                            <form action="{{ route('tenant.destroy', $tenant->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-500 text-black rounded-md hover:bg-red-600 transition duration-300">
                                    Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
