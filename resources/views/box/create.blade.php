<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Création du box') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <a href="{{ route('box.index') }}" class="inline-block mb-4 px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition duration-300">
                    Retour à la liste
                </a>

                <form action="{{ route('box.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-gray-700 font-semibold mb-1">Nom du box :</label>
                            <input type="text" id="name" name="name" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
                        </div>
                        <div>
                            <label for="address" class="block text-gray-700 font-semibold mb-1">Adresse du box :</label>
                            <input type="text" id="address" name="address" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
                        </div>
                        <div>
                            <label for="code" class="block text-gray-700 font-semibold mb-1">Code postal :</label>
                            <input type="text" id="code" name="code" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
                        </div>
                        <div>
                            <label for="city" class="block text-gray-700 font-semibold mb-1">Ville :</label>
                            <input type="text" id="city" name="city" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
                        </div>
                        <div>
                            <label for="country" class="block text-gray-700 font-semibold mb-1">Pays :</label>
                            <input type="text" id="country" name="country" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
                        </div>
                        <div>
                            <label for="price" class="block text-gray-700 font-semibold mb-1">Loyer (€/mois) :</label>
                            <input type="number" id="price" name="price" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-300">
                            Ajouter
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
