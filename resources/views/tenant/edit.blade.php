<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modification du locataire') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <a href="{{ route('tenant.index') }}" class="inline-block mb-4 px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition duration-300">
                    Retour à la liste
                </a>

                <form action="{{ route('tenant.update', $tenant->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="lastname" class="block text-gray-700 font-semibold mb-1">Nom de famille :</label>
                            <input type="text" id="lastname" name="lastname" value="{{ $tenant->lastname }}" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
                        </div>
                        <div>
                            <label for="firstname" class="block text-gray-700 font-semibold mb-1">Prénom :</label>
                            <input type="text" id="firstname" name="firstname" value="{{ $tenant->firstname }}" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
                        </div>
                        <div>
                            <label for="email" class="block text-gray-700 font-semibold mb-1">Adresse mail:</label>
                            <input type="email" id="email" name="email" value="{{ $tenant->email }}" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
                        </div>
                        <div>
                            <label for="phone" class="block text-gray-700 font-semibold mb-1">Numéro de téléphone :</label>
                            <input type="text" id="phone" name="phone" value="{{ $tenant->phone }}" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-300">
                            Modifier
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
