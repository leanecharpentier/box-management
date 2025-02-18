<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Informations du contrat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-6">
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

                <div class="mt-6 flex gap-4">
                    <a href="{{ route('model_contract.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition duration-300">
                        Retour à la liste
                    </a>
                    <a href="{{ route('model_contract.edit', $model_contract->id) }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-300">
                        Modifier
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
