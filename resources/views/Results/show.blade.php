<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reservaties') }}
        </h2>
    </x-slot>

    @if (session('success'))

    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative w-3/4 m-auto text-center my-6"
        role="alert">
        <h3 class="block sm:inline">{{ session('success') }}</h3>

    </div>
    @elseif (session('error'))

    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative w-3/4 m-auto text-center my-6" role="alert">
        <h3 class="block sm:inline">{{ session('error') }}</h3>
       
    </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-3/4 bg-white m-auto mt-5 mb-5">
            <thead>
                <tr>
                    <th
                        class="px-4 py-2 border-b-2 border-r border-gray-300 text-left leading-4  tracking-wider">
                        Volledigenaam</th>
                    <th
                        class="px-4 py-2 border-b-2 border-r border-gray-300 text-left leading-4 tracking-wider">
                        Score</th>

                    <th
                        class="px-4 py-2 border-b-2 border-r border-gray-300 text-left leading-4 tracking-wider">
                        Wijzigen</th>
                </tr>
            </thead>
            <tbody>
                {{-- if statement that checks if the array is empty and gives an message to the user if it is--}}
                @if($results->isEmpty())
                <tr class="bg-white dark:bg-gray-800">
                    <td class="px-4 py-2 border-b border-gray-300 text-white bg-red-700 text-center"
                        colspan="10">Geen
                        resultaten gevonden, probeer het later opnieuw.</td>
                </tr>
                @else
                {{-- shows the data of the given array --}}
                @foreach($results as $result)
                <tr class="bg-white dark:bg-gray-800">
                    <td class="px-4 py-2 border-b border-gray-300  border-r">{{ $result->FullName }}</td>
                    <td class="px-4 py-2 border-b border-gray-300  border-r">{{ $result->AmountPoints }}</td>
                    <td class="px-4 py-2 border-b border-gray-300 text-white border-r"><a
                            href="{{ route('results.edit', $result->Id) }}"
                            class="bg-green-700 p-1 rounded">Wijzigen</a></td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        <div class="m-auto mt-5 mb-5 w-3/4">
            {{-- pagination buttons --}}
            {{$results->links() }}
        </div>
    </div>




</x-app-layout>