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
                        Reservatie datum</th>
                    <th
                        class="px-4 py-2 border-b-2 border-r border-gray-300 text-left leading-4 tracking-wider">
                        Aantal uren</th>
                    <th
                        class="px-4 py-2 border-b-2 border-r border-gray-300 text-left leading-4 tracking-wider">
                       Start tijd</th>
                    <th
                        class="px-4 py-2 border-b-2 border-r border-gray-300 text-left leading-4 tracking-wider">
                        Eind tijd</th>
                    <th
                        class="px-4 py-2 border-b-2 border-r border-gray-300 text-left leading-4 tracking-wider">
                        Aantal volwassenen</th>
                    <th
                        class="px-4 py-2 border-b-2 border-r border-gray-300 text-left leading-4 tracking-wider">
                        Aantal kinderen</th>
                    <th
                        class="px-4 py-2 border-b-2 border-r border-gray-300 text-left leading-4 tracking-wider">
                        Scores</th>
                </tr>
            </thead>
            <tbody>
                {{-- if statement that checks if the array is empty and gives an message to the user if it is--}}
                @if($reservations->isEmpty())
                <tr class="bg-white dark:bg-gray-800">
                    <td class="px-4 py-2 border-b border-gray-300 text-white bg-red-700 text-center"
                        colspan="10">Geen
                        resultaten gevonden, probeer het later opnieuw.</td>
                </tr>
                @else
                {{-- shows the data of the given array --}}
                @foreach($reservations as $reservation)
                <tr class="bg-white dark:bg-gray-800">
                    <td class="px-4 py-2 border-b border-gray-300  border-r">{{ $reservation->FullName }}</td>
                    <td class="px-4 py-2 border-b border-gray-300  border-r">{{ $reservation->Date }}</td>
                    <td class="px-4 py-2 border-b border-gray-300  border-r">{{ $reservation->AmountHours }}</td>
                    <td class="px-4 py-2 border-b border-gray-300  border-r">{{ $reservation->Starttime }}</td>
                    <td class="px-4 py-2 border-b border-gray-300  border-r">{{ $reservation->EndTime }}</td>
                    <td class="px-4 py-2 border-b border-gray-300  border-r">{{ $reservation->AmountAdults }}</td>
                    <td class="px-4 py-2 border-b border-gray-300  border-r">{{ $reservation->AmountKids }}</td>
                    <td class="px-4 py-2 border-b border-gray-300 text-white border-r"><a
                            href="{{ route('results.show', $reservation->Id) }}"
                            class="bg-green-700 p-1 rounded">Scores</a></td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        <div class="m-auto mt-5 mb-5 w-3/4">
            {{-- pagination buttons --}}
            {{$reservations->links() }}
        </div>
    </div>




</x-app-layout>