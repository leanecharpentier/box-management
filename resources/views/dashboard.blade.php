<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de bord') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ([
                    ['name' => 'Gestion des box', 'link' => route('box.index')],
                    ['name' => 'Gestion des locataires', 'link' => route('tenant.index')],
                    ['name' => 'Gestion des contrats', 'link' => route('contract.index')],
                    ['name' => 'Génération des factures', 'link' => route('bill.index')],
                    ['name' => 'Suivi des paiements', 'link' => route('payment.index')],
                    ['name' => 'Gestion des impôts', 'link' => route('tax.index')],
                ] as $item)
                    <a href="{{ $item['link'] }}" class="block bg-white shadow-lg rounded-lg p-6 text-center 
                        text-gray-900 transition duration-300
                        hover:bg-blue-500 hover:text-white hover:shadow-2xl hover:scale-105 cursor-pointer">
                        <span class="text-lg font-semibold">{{ $item['name'] }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
