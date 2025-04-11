<x-app-layout>
<body class="bg-gray-100 text-white-800">
    <div class="container mx-auto py-8">
        <h1 class="text-bordeaux text-2xl font-bold text-center mb-6">Klanten Overzicht</h1>

        <!-- Bericht weergeven als een sessie een 'success'-bericht bevat -->
        @if(session()->has('success'))
            <div class="bg-green-100 text-green-800 border border-green-200 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabel met alle personen -->
        <div class="overflow-x-auto mx-auto max-w-6xl">
            <table class="table-auto w-full bg-white border-collapse border border-gray-200 shadow-md">
                <thead style="background-color: #001f3d;" class="text-white">
                    <tr>
                        <th class="px-4 py-2 border border-gray-300">Naam</th>
                        <th class="px-4 py-2 border border-gray-300">Mobiel</th>
                        <th class="px-4 py-2 border border-gray-300">Email</th>
                        <th class="px-4 py-2 border border-gray-300">Volwassen</th>
                        <th class="px-4 py-2 border border-gray-300">Type</th>
                    </tr>
                </thead>
                <tbody>
                    @if($peopel->isEmpty())
                        <tr>
                            <td class="px-4 py-2 border border-gray-300 text-center bg-blue-100 align-middle h-16" colspan="5">Er is geen data beschikbaar.</td>
                        </tr>
                    @else
                    @foreach($peopel as $person)
                        <tr class="text-center hover:bg-gray-50">
                            <td class="px-4 py-2 border border-gray-300">{{ $person->name }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ $person->phone }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ $person->email }}</td>
                            <td class="px-4 py-2 border border-gray-300">
                                {{ $person->adult ? 'Ja' : 'Nee' }}
                            </td>
                            <td class="px-4 py-2 border border-gray-300">{{ $person->TypeName }}</td>
                        </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
                <!-- Knop naar homepage -->
                <div class="flex justify-end mt-4">
                <a href="/"
                    style="background-color: #001f3d;" 
                    class="text-white px-6 py-2 rounded font-semibold shadow-md transition">Home pagina</a>
            </div>
            <!-- Paginatie Links -->
            <div class="mt-6">
                {{ $peopel->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
