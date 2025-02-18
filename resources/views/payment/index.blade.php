<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Suivi des paiements') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-6">
                @if (count($bills) > 0)
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">Listes des factures</h2>
                    <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
                        <thead class="bg-gray-100">
                            <tr class="border-b border-gray-300">
                                <th class="px-6 py-4 font-semibold text-gray-700 border-r border-gray-300">Nom du box</th>
                                <th class="px-6 py-4 font-semibold text-gray-700 border-r border-gray-300">Nom du locataire</th>
                                <th class="px-6 py-4 font-semibold text-gray-700 border-r border-gray-300">Date de la facture</th>
                                <th class="px-6 py-4 font-semibold text-gray-700 border-r border-gray-300">Date du paiement</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-300">
                            @foreach($bills as $bill)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 text-center border-r border-gray-300">{{ $bill->contract->box->name }}</td>
                                    <td class="px-6 py-4 text-center border-r border-gray-300">{{ $bill->contract->tenant->lastname . " " . $bill->contract->tenant->firstname }}</td>
                                    <td class="px-6 py-4 text-center border-r border-gray-300">
                                        {{ \Carbon\Carbon::parse($bill->contract->start_date)->addMonths((int) $bill->period_number - 1)->format('Y-m-d') }}
                                    </td>
                                    <td class="px-6 py-4 text-center border-r border-gray-300">
                                        @if ($bill->payment_date)
                                            {{ $bill->payment_date }}
                                        @else
                                            <form action="{{ route('payment.update', $bill->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="date" name="payment_date" value="{{ now() }}">
                                                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-300">
                                                    Enregistrer
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">Aucun contrats en cours</h2>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
