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
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative w-3/4 m-auto text-center my-6 success-message transition-opacity duration-10000"
            role="alert">
            <h3 class="block sm:inline">{{ session('success') }}</h3>
        </div>
    @endif

    {{-- Date Filter Form --}}
    <div class="w-3/4 m-auto mt-5 mb-3 p-4 bg-white dark:bg-gray-800 rounded-lg shadow">
        <form action="{{ route('reservations.index') }}" method="GET" class="flex flex-wrap items-end gap-4"
            id="dateFilterForm">
            <div class="flex-grow">
                <label for="filter_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Filter
                    op datum</label>
                <input type="date" id="filter_date" name="filter_date" value="{{ request('filter_date') }}"
                    class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
            <div class="flex gap-2">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-300">
                    Filteren
                </button>
                @if (request()->has('filter_date') && request('filter_date'))
                    <a href="{{ route('reservations.index') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition duration-300"
                        id="resetFilterBtn">
                        Reset
                    </a>
                @endif
            </div>
        </form>
    </div>

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
                        class="px-4 py-2 border-b-2 border-r border-gray-300 dark:border-gray-700 text-left leading-4 tracking-wider">
                        Aantal Kinderen
                    </th>
                    <th
                        class="px-4 py-2 border-b-2 border-r border-gray-300 dark:border-gray-700 text-left leading-4 tracking-wider">
                        Baan nummer
                    </th>
                    <th
                        class="px-4 py-2 border-b-2 border-r border-gray-300 dark:border-gray-700 text-left leading-4 tracking-wider">
                        Baan nummer wijzigen
                    </th>
                </tr>
            </thead>
            {{-- Table body --}}
            <tbody>
                {{-- If no reservations are found --}}
                @if ($reservations->isEmpty())
                    <tr class="bg-white dark:bg-gray-800">
                        <td class="px-4 py-2 border-b border-gray-300 dark:border-gray-700 text-white bg-red-700 text-center"
                            colspan="9">
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
                                    class="bg-blue-700 text-white p-2 rounded hover:bg-blue-800 dark:hover:bg-blue-900">Baan
                                    wijzigen</a>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get all success messages
            const successMessages = document.querySelectorAll('.success-message');

            // For each success message, start the fade out process
            successMessages.forEach(function(successMessage) {
                // Add the transition styling
                successMessage.style.transition = 'opacity 3s ease-out';

                // Wait 4 seconds before starting the fade
                setTimeout(function() {
                    successMessage.style.opacity = '0';

                    // Once fully faded, hide the element
                    setTimeout(function() {
                        successMessage.style.display = 'none';
                    }, 3000); // Wait for fade to complete
                }, 1000); // 4 seconds delay before starting fade
            });

        });
    </script>

</x-app-layout>
