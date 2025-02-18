<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion des impôts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
                    <thead class="bg-gray-100">
                        <tr class="border-b border-gray-300">
                            <th class="px-6 py-4 font-semibold text-gray-700 border-r border-gray-300">Régime</th>
                            <th class="px-6 py-4 font-semibold text-gray-700 border-r border-gray-300">Régime Micro-foncier</th>
                            <th class="px-6 py-4 font-semibold text-gray-700">Régime réel</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-300">
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-center border-r border-gray-300">Possibilité de choisir ce régime</td>
                            <td class="px-6 py-4 text-center border-r border-gray-300">
                                @if ($sum_bills < 15000)
                                    Oui car revenu inférieur à 15000€ annuel
                                @else
                                    Non car revenu supérieur à 15000€ annuel
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center border-r border-gray-300">
                                @if ($sum_bills < 15000)
                                    Non car revenu inférieur à 15000€ annuel
                                @else
                                    Oui et obligatoire car revenu supérieur à 15000€ annuel
                                @endif
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-center border-r border-gray-300">Case à cocher</td>
                            <td class="px-6 py-4 text-center border-r border-gray-300">Case 4 BE déclaration n°2042</td>
                            <td class="px-6 py-4 text-center border-r border-gray-300">Case 4 BA déclaration n°2044</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-center border-r border-gray-300">Montant à renseigner</td>
                            <td class="px-6 py-4 text-center border-r border-gray-300">{{ $sum_bills }}</td>
                            <td class="px-6 py-4 text-center border-r border-gray-300">{{ $sum_bills }}</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-center border-r border-gray-300">Montant imposable</td>
                            <td class="px-6 py-4 text-center border-r border-gray-300">{{ $sum_bills * 0.7 }}</td>
                            <td class="px-6 py-4 text-center border-r border-gray-300">{{ $sum_bills }}</td>
                        </tr>
                    </tbody>
                </table>
                <button class="mt-6 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-300" id="exportPdf">Exporter en PDF</button>

                <script>
                    document.getElementById('exportPdf').addEventListener('click', () => {
                        fetch('/tax/export-pdf', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            },
                            body: JSON.stringify({ sum_bills: {{ $sum_bills }} })
                        })
                        .then(response => response.blob())
                        .then(blob => {
                            const url = window.URL.createObjectURL(blob);
                            const a = document.createElement('a');
                            a.href = url;
                            a.download = 'impots.pdf';
                            document.body.appendChild(a);
                            a.click();
                            document.body.removeChild(a);
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</x-app-layout>
