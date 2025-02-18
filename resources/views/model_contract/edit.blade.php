<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modification du modèle de contrat') }}
        </h2>
    </x-slot>

   <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <a href="{{ route('model_contract.index') }}" class="inline-block mb-4 px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition duration-300">
                    Retour à la liste
                </a>
                    
                <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
                <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
                <script src="https://cdn.jsdelivr.net/npm/@editorjs/paragraph@latest"></script>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const editor = new EditorJS({
                            holder: 'editorjs',
                            data: {!! json_encode(json_decode($model_contract->content), JSON_UNESCAPED_UNICODE) !!},
                            tools: {
                                header: Header,
                                paragraph: Paragraph
                            },
                            placeholder: 'Modifie ton contenu ici...',
                        });

                        document.getElementById('editForm').addEventListener('submit', async function(event) {
                            event.preventDefault();
                            const outputData = await editor.save();
                            document.getElementById('content').value = JSON.stringify(outputData);
                            this.submit();
                        });
                    });
                </script>

                <form action="{{ route('model_contract.update', $model_contract->id) }}" method="POST" class="space-y-6" id="editForm">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-gray-700 font-semibold mb-1">Nom du template :</label>
                            <input type="text" id="name" name="name" value="{{ $model_contract->name }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
                        </div>
                       <div class="mb-6" id="editorjs" class="w-full"></div>
                        <input type="hidden" name="content" id="content">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-300">
                            Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
