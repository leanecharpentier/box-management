<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Créer un contrat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('contract.index') }}">Retour à la liste</a>
                    <form action="{{ route('contract.store') }}" method="POST">
                        @csrf
                        <div>
                            <label for="start_date">Date de début du contrat : </label>
                            <input type="date" id="start_date" name="start_date">
                        </div>
                        <div>
                            <label for="end_date">Date de fin du contrat : </label>
                            <input type="date" id="end_date" name="end_date">
                        </div>
                        <div>
                            <label for="monthly_price">Montant du loyer : </label>
                            <input type="number" id="monthly_price" name="monthly_price">
                        </div>
                        <div>
                            <label for="tenant_id">Locataire : </label>
                            <select name="tenant_id" id="tenant_id">
                                <option value="">-- Sélectionner un locataire --</option>
                                @foreach ($tenants as $tenant)
                                    <option value="{{ $tenant->id }}">{{ $tenant->lastname . " " . $tenant->firstname }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                             <label for="box_id">Box : </label>
                            <select name="box_id" id="box_id">
                                <option value="">-- Sélectionner un box --</option>
                                @foreach ($boxes as $box)
                                    <option value="{{ $box->id }}">{{ $box->name }}</option>
                                @endforeach
                            </select>
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
