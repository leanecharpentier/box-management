<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Information du contrat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
                    <tbody>
                        <tr class="border-b">
                            <td class="px-4 py-2 font-semibold bg-gray-100">Nom du box</td>
                            <td class="px-4 py-2">{{ $contract->box->name }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="px-4 py-2 font-semibold bg-gray-100">Nom du locataire</td>
                            <td class="px-4 py-2">{{ $contract->tenant->lastname . " " . $contract->tenant->firstname }}</td>
                        </tr>
                       <tr class="border-b">
                            <td class="px-4 py-2 font-semibold bg-gray-100">Date de début</td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($contract->start_date)->translatedFormat('j F Y') }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="px-4 py-2 font-semibold bg-gray-100">Date de fin</td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($contract->end_date)->translatedFormat('j F Y') }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 font-semibold bg-gray-100">Loyer</td>
                            <td class="px-4 py-2">{{ $contract->monthly_price . " €/mois" }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="mt-6 flex gap-4">
                    <a href="{{ route('contract.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition duration-300">
                        Retour à la liste
                    </a>
                    <a href="{{ route('contract.edit', $contract->id) }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-300">
                        Modifier
                    </a>
                    <a href="" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-300">
                        Générer le contrat
                    </a>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg p-6">
                <div id="editorjs"></div>
                <button class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-300" id="exportPdf">Exporter en PDF</button>

                <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
                <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
                <script src="https://cdn.jsdelivr.net/npm/@editorjs/paragraph@latest"></script>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const editor = new EditorJS({
                            holder: 'editorjs',
                            data: {!! json_encode($content, JSON_UNESCAPED_UNICODE) !!},
                            readOnly: true,
                            tools: {
                                header: {
                                    class: Header,
                                    inlineToolbar: true
                                },
                                paragraph: {
                                    class: Paragraph,
                                    inlineToolbar: true
                                }
                            }
                        });
                    });

                    document.getElementById('exportPdf').addEventListener('click', () => {
                        fetch('/contract/export-pdf', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            },
                            body: JSON.stringify({ content: {!! json_encode($content, JSON_UNESCAPED_UNICODE) !!} })
                        })
                        .then(response => response.blob())
                        .then(blob => {
                            const url = window.URL.createObjectURL(blob);
                            const a = document.createElement('a');
                            a.href = url;
                            a.download = 'contrat.pdf';
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
