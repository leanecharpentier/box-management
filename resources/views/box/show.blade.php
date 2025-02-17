<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">Informations sur le box</h2>
                
                <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
                    <tbody>
                        <tr class="border-b">
                            <td class="px-4 py-2 font-semibold bg-gray-100">Nom</td>
                            <td class="px-4 py-2">{{ $box->name }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="px-4 py-2 font-semibold bg-gray-100">Adresse</td>
                            <td class="px-4 py-2">{{ $box->address . " " . $box->code . " " .  $box->city }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 font-semibold bg-gray-100">Loyer (€/mois)</td>
                            <td class="px-4 py-2">{{ $box->price }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="mt-6 flex gap-4">
                    <a href="{{ route('box.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition duration-300">
                        Retour à la liste
                    </a>
                    <a href="{{ route('box.edit', $box->id) }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-300">
                        Modifier
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
