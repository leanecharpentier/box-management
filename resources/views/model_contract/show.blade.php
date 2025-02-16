<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Détail du contrat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('model_contract.index') }}">Retour à la liste</a>
                    <div id="editorjs"></div>

                    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
                    <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
                    <script src="https://cdn.jsdelivr.net/npm/@editorjs/paragraph@latest"></script>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const editor = new EditorJS({
                                holder: 'editorjs',
                                data: {!! json_encode(json_decode($model_contract->content), JSON_UNESCAPED_UNICODE) !!}, 
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
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
