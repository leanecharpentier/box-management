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
                    <a href="{{ route('box.index') }}">Retour à la liste</a>
                    

                    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
                    <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
                    <script src="https://cdn.jsdelivr.net/npm/@editorjs/paragraph@latest"></script>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const editor = new EditorJS({
                                holder: 'editorjs',
                                tools: {
                                    header: {
                                        class: Header,
                                        inlineToolbar: true
                                    },
                                    paragraph: {
                                        class: Paragraph,
                                        inlineToolbar: true
                                    }
                                },
                                placeholder: 'Écris ton contenu ici...'
                            });

                            document.getElementById('postForm').addEventListener('submit', async function(event) {
                                event.preventDefault();
                                const outputData = await editor.save();
                                document.getElementById('content').value = JSON.stringify(outputData);
                                this.submit();
                            });
                        });
                    </script>

                    <form action="{{ route('model_contract.store') }}" method="POST" id="postForm">
                        @csrf
                        <div>
                            <label for="name">Nom du template de contrat : </label>
                            <input type="text" id="name" name="name">
                        </div>
                        <div id="editorjs"></div>
                        <input type="hidden" name="content" id="content">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
