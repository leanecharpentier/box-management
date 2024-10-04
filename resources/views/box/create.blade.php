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
                    <a href="{{ route('box.index') }}">Retour à la liste</a>
                    <form action="{{ route('box.store') }}" method="POST">
                        @csrf
                        <div>
                            <label for="name">Nom du box : </label>
                            <input type="text" id="name" name="name">
                        </div>
                        <div>
                            <label for="address">Adresse du box : </label>
                            <input type="text" id="address" name="address">
                        </div>
                        <div>
                            <label for="code">Code postal : </label>
                            <input type="text" id="code" name="code">
                        </div>
                        <div>
                            <label for="city">Ville : </label>
                            <input type="text" id="city" name="city">
                        </div>
                        <div>
                            <label for="country">Pays : </label>
                            <input type="text" id="country" name="country">
                        </div>
                        <div>
                            <label for="rent">Loyer (€/mois) : </label>
                            <input type="number" id="rent" name="rent">
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
