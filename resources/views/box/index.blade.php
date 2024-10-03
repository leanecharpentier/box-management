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
                    <table class="border">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Adresse</th>
                                <th>Loyer (€/mois)</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($box as $box1)
                                <tr>
                                    <td>{{ $box1->id }}</td>
                                    <td>{{ $box1->name }}</td>
                                    <td>{{ $box1->address . " " . $box1->code . " " .  $box1->city }}</td>
                                    <td>{{ $box1->rent }}</td>
                                    <td><a href="{{ route('box.show', $box1->id) }}">Voir</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
