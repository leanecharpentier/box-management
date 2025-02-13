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
                    <a href="{{ route('box.show') }}">Annuler</a>
                    <form action="{{ route('tenant.store') }}" method="POST">
                        @csrf
                        <div>
                            <label for="name">Nom de famille du locataire : </label>
                            <input type="text" id="name" name="name">
                        </div>
                        <div>
                            <label for="address">Prénom de famille du locataire : </label>
                            <input type="text" id="address" name="address">
                        </div>
                        <div>
                            <label for="code">Adresse mail: </label>
                            <input type="text" id="code" name="code">
                        </div>
                        <div>
                            <label for="city">Numéro de téléphone : </label>
                            <input type="text" id="city" name="city">
                        </div>
                        <div>
                            <button type="submit">Envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
