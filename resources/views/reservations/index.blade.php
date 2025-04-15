{{-- filepath: c:\Users\bilag\OneDrive - MBO Utrecht\MBO-U-Leerljaar-2\EXAMEN!!!!!!!!\dag 3\ProefexamenDag3\resources\views\reservations\index.blade.php --}}
<x-app-layout>

    {{-- Title on the top of the screen --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Reserveringen Overzicht
        </h2>
    </x-slot>

    {{-- Success message --}}
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative w-3/4 m-auto text-center my-6"
            role="alert">
            <h3 class="block sm:inline">{{ session('success') }}</h3>
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-3/4 bg-white dark:bg-gray-800 m-auto mt-5 mb-5">
            <thead>
                <tr>
                    <th
                        class="px-4 py-2 border-b-2 border-r border-gray-300 dark:border-gray-700 text-left leading-4 tracking-wider">
                        Naam
                    </th>
                    <th
                        class="px-4 py-2 border-b-2 border-r border-gray-300 dark:border-gray-700 text-left leading-4 tracking-wider">
                        Datum
                    </th>
                    <th
                        class="px-4 py-2 border-b-2 border-r border-gray-300 dark:border-gray-700 text-left leading-4 tracking-wider">
                        Aantal Uren
                    </th>
                    <th
                        class="px-4 py-2 border-b-2 border-r border-gray-300 dark:border-gray-700 text-left leading-4 tracking-wider">
                        Begintijd
                    </th>
                    <th
                        class="px-4 py-2 border-b-2 border-r border-gray-300 dark:border-gray-700 text-left leading-4 tracking-wider">
                        Eindtijd
                    </th>
                    <th
                        class="px-4 py-2 border-b-2 border-r border-gray-300 dark:border-gray-700 text-left leading-4 tracking-wider">
                        Aantal Volwassenen
                    </th>
                    <th
                        class="px-4 py-2 border-b-2 border-gray-300 dark:border-gray-700 text-left leading-4 tracking-wider">
                        Aantal Kinderen
                    </th>
                    <th
                        class="px-4 py-2 border-b-2 border-gray-300 dark:border-gray-700 text-left leading-4 tracking-wider">
                        Baan nummer
                    </th>
                    <th
                        class="px-4 py-2 border-b-2 border-gray-300 dark:border-gray-700 text-left leading-4 tracking-wider">
                        Baan nummer wijzigen
                    </th>
                </tr>
            </thead>
            <tbody>
                {{-- If no reservations are found --}}
                @if ($reservations->isEmpty())
                    <tr class="bg-white dark:bg-gray-800">
                        <td class="px-4 py-2 border-b border-gray-300 dark:border-gray-700 text-white bg-red-700 text-center"
                            colspan="7">
                            Geen reserveringen gevonden, probeer het later opnieuw.
                        </td>
                    </tr>
                @else
                    {{-- Display reservations --}}
                    @foreach ($reservations as $reservation)
                        <tr class="bg-white dark:bg-gray-800">

                            <td class="px-4 py-2 border-b border-gray-300 dark:border-gray-700 border-r">
                                {{ $reservation->FullName }}
                            </td>
                            <td class="px-4 py-2 border-b border-gray-300 dark:border-gray-700 border-r">
                                {{ $reservation->Date }}
                            </td>
                            <td class="px-4 py-2 border-b border-gray-300 dark:border-gray-700 border-r">
                                {{ $reservation->AmountHours }}
                            </td>
                            <td class="px-4 py-2 border-b border-gray-300 dark:border-gray-700 border-r">
                                {{ $reservation->StartTime }}
                            </td>
                            <td class="px-4 py-2 border-b border-gray-300 dark:border-gray-700 border-r">
                                {{ $reservation->EndTime }}
                            </td>
                            <td class="px-4 py-2 border-b border-gray-300 dark:border-gray-700 border-r">
                                {{ $reservation->AmountAdults }}
                            </td>
                            <td class="px-4 py-2 border-b border-gray-300 dark:border-gray-700 border-r">
                                {{ $reservation->AmountKids }}
                            </td>
                            <td class="px-4 py-2 border-b border-gray-300 dark:border-gray-700 border-r">
                                {{ $reservation->LaneNumber }}
                            </td>
                            <td class="px-4 py-2 border-b border-gray-300 dark:border-gray-700 border-r">
                                <a href="{{ route('reservations.edit', ['id' => $reservation->LaneId, 'resId' => $reservation->Id]) }}"
                                    class="bg-blue-700 text-white p-2 rounded hover:bg-blue-800 dark:hover:bg-blue-900">Baan wijzigen</a>
                                  </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="m-auto mt-5 mb-5 w-3/4">
            {{ $reservations->links() }}
        </div>

    </div>

</x-app-layout>
