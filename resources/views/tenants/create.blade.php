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
                    <a href="{{ route('box.show', ["id" => $box_id]) }}">Annuler</a>
                    <form action="{{ route('tenants.store', ["box_id" => $box_id]) }}" method="POST">
                        @csrf
                        <div>
                            <label for="lastname">Nom de famille du locataire : </label>
                            <input type="text" id="lastname" name="lastname">
                        </div>
                        <div>
                            <label for="firstname">Prénom de famille du locataire : </label>
                            <input type="text" id="firstname" name="firstname">
                        </div>
                        <div>
                            <label for="email">Adresse mail: </label>
                            <input type="text" id="email" name="email">
                        </div>
                        <div>
                            <label for="phone">Numéro de téléphone : </label>
                            <input type="text" id="phone" name="phone">
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
