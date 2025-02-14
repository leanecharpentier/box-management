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
                    <a href="{{ route('tenant.index') }}">Retour à la liste</a>
                    <form action="{{ route('tenant.update', $tenant->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="lastname">Nom de famille : </label>
                            <input type="text" id="lastname" name="lastname" value="{{ $tenant->lastname }}">
                        </div>
                        <div>
                            <label for="firstname">Prénom : </label>
                            <input type="text" id="firstname" name="firstname" value="{{ $tenant->firstname }}">
                        </div>
                        <div>
                            <label for="email">Adresse mail : </label>
                            <input type="email" id="email" name="email" value="{{ $tenant->email }}">
                        </div>
                        <div>
                            <label for="phone">Numéro de téléphone : </label>
                            <input type="text" id="phone" name="phone" value="{{ $tenant->phone }}">
                        </div>
                        <div>
                            <button type="submit">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
