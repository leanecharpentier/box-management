<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Modifier le contrat : {{ $model_contract->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('model_contract.index') }}">Retour à la liste</a>
                    
                    <form action="{{ route('model_contract.update', $model_contract->id) }}" method="POST" id="editForm">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="name">Nom du template de contrat : </label>
                            <input type="text" id="name" name="name" value="{{ $model_contract->name }}">
                        </div>
                        <div id="editorjs"></div>
                        <input type="hidden" name="content" id="content">
                        <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Enregistrer les modifications
                        </button>
                    </form>
                    
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

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
