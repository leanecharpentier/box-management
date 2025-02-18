<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Génération des factures') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-6">
                @if (count($contracts) > 0)
                    <div class="flex flex-row items-center justify-between mb-6">
                        <h2 class="text-2xl font-semibold text-gray-900 mb-4">Liste des contrats en cours</h2>
                        <form action="{{ route('bill.store_many') }}" method="POST">
                            @csrf
                            <input type="hidden" name="contracts" value="{{ json_encode($contracts) }}">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-300">
                                Générer toutes les factures
                            </button>
                        </form>
                    </div>
                    <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
                        <thead class="bg-gray-100">
                            <tr class="border-b border-gray-300">
                                <th class="px-6 py-4 font-semibold text-gray-700 border-r border-gray-300">Nom du box</th>
                                <th class="px-6 py-4 font-semibold text-gray-700 border-r border-gray-300">Nom du locataire</th>
                                <th class="px-6 py-4 font-semibold text-gray-700"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-300">
                            @foreach($contracts as $contract)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 text-center border-r border-gray-300">{{ $contract->box->name }}</td>
                                    <td class="px-6 py-4 text-center border-r border-gray-300">{{ $contract->tenant->lastname . " " . $contract->tenant->firstname }}</td>
                                    <td class="px-6 py-4 text-center">
                                        @php
                                            $currentPeriod = ceil(Carbon\Carbon::parse($contract->start_date)->floatDiffInMonths(Carbon\Carbon::now()));
                                            $billExists = $contract->bills->contains('period_number', $currentPeriod);
                                        @endphp

                                        @if ($billExists)
                                            Facture déjà générée
                                        @else
                                            <form action="{{ route('bill.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="contract_id" value="{{ $contract->id }}">
                                                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-300">
                                                    Générer la facture
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">Aucun contrat en cours</h2>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
