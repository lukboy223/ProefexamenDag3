<x-app-layout>
    <body class="bg-gray-100 text-gray-800">
        <div class="container mx-auto py-8">
            <h1 class="text-bordeaux text-3xl font-bold text-center mb-6">Klanten Overzicht</h1>

            <!-- Bericht weergeven als een sessie een 'success'-bericht bevat -->
            @if(session()->has('success'))
                <div class="bg-green-100 text-green-800 border border-green-200 p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Zoek formulier -->
            <form method="GET" action="{{ route('peopel.index') }}" class="mb-6 flex justify-center items-center gap-4">
                <label for="datum" class="font-semibold">Zoek op datum:</label>
                <input type="date" name="datum" id="datum" value="{{ $selectedDate ?? '' }}" class="border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-bordeaux">
                <button type="submit" class="bg-bordeaux text-black px-6 py-2 rounded-lg shadow-md hover:bg-bordeaux-dark transition duration-300">Tonen</button>
            </form>

            <!-- Tabel met alle personen -->
            <div class="overflow-x-auto mx-auto max-w-6xl">
                <table class="table-auto w-full bg-white shadow-lg rounded-lg border-collapse">
                    <thead class="bg-bordeaux text-black">
                        <tr>
                            <th class="px-6 py-3 text-left border border-gray-300">Naam</th>
                            <th class="px-6 py-3 text-left border border-gray-300">Mobiel</th>
                            <th class="px-6 py-3 text-left border border-gray-300">Email</th>
                            <th class="px-6 py-3 text-left border border-gray-300">Volwassen</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($peopel->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center text-red-600 bg-yellow-100 py-4">
                                    @if(request('datum'))
                                        Er is geen informatie beschikbaar voor deze geselecteerde datum ({{ request('datum') }}).
                                    @else
                                        Er is geen data beschikbaar.
                                    @endif
                                </td>
                            </tr>
                        @else
                            @foreach($peopel as $person)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 border py-3 text-black">{{ $person->FirstName }} {{ $person->Infix }} {{ $person->LastName }}</td>
                                    <td class="px-6 border py-3 text-black">{{ $person->Phone ?? '-' }}</td>
                                    <td class="px-6 border py-3 text-black">{{ $person->Email ?? '-' }}</td>
                                    <td class="px-6 border py-3 text-black">{{ $person->Adult ? 'Ja' : 'Nee' }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

                <!-- Knop naar homepage -->
                <div class="flex justify-end mt-4">
                    <a href="/" class="bg-white text-black px-6 py-2 rounded-lg shadow-md hover:bg-gray-200 transition duration-300">
                        Home pagina
                    </a>
                </div>

                <!-- Paginatie Links
                <div class="mt-6">
                    {{ $peopel->links() }}
                </div> -->
            </div>
        </div>
    </body>
</x-app-layout>
