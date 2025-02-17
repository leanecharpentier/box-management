<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <a href="{{ route('contract.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition duration-300">
                    Retour à la liste
                </a>
                <form action="{{ route('contract.update', $contract->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="start_date" class="block text-gray-700 font-semibold">Date de début du contrat : </label>
                            <input type="date" id="start_date" name="start_date" value="{{ $contract->start_date }}" class="mt-2 p-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label for="end_date" class="block text-gray-700 font-semibold">Date de fin du contrat : </label>
                            <input type="date" id="end_date" name="end_date" value="{{ $contract->end_date }}" class="mt-2 p-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label for="tenant_id" class="block text-gray-700 font-semibold">Locataire : </label>
                            <select name="tenant_id" id="tenant_id" class="mt-2 p-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="{{ $contract->tenant_id }}">{{ $contract->tenant->lastname . " " . $contract->tenant->firstname }}</option>
                                @foreach ($tenants as $tenant)
                                    @if ($contract->tenant_id != $tenant->id)
                                        <option value="{{ $tenant->id }}">{{ $tenant->lastname . " " . $tenant->firstname }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="box_id" class="block text-gray-700 font-semibold">Box : </label>
                            <select name="box_id" id="box_id" class="mt-2 p-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="{{ $contract->box_id }}">{{ $contract->box->name }}</option>
                                @foreach ($boxes as $box)
                                    @if ($contract->box_id != $box->id)
                                        <option value="{{ $box->id }}">{{ $box->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="monthly_price" class="block text-gray-700 font-semibold">Montant du loyer : </label>
                            <input type="number" id="monthly_price" name="monthly_price" value="{{ $contract->monthly_price }}" class="mt-2 p-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label for="model_contract_id" class="block text-gray-700 font-semibold">Box :</label>
                            <select name="model_contract_id" id="model_contract_id" class="mt-2 p-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required onchange="updatePrice()">
                                <option value="{{ $models_contracts->box_id }}">{{ $models_contracts->name }}</option>
                                @foreach ($models_contracts as $model_contract)
                                    <option value="{{ $model_contract->id }}">{{ $model_contract->name }}</option>
                                @endforeach
                            </select>
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
