{{-- filepath: c:\Users\bilag\OneDrive - MBO Utrecht\MBO-U-Leerljaar-2\EXAMEN!!!!!!!!\dag 3\ProefexamenDag3\resources\views\reservations\edit.blade.php --}}

<x-app-layout>


<form action="{{ route('reservations.update', ['id' => $resId]) }}" method="POST" class="bg-gray-100 p-6 rounded-lg shadow-lg dark:bg-gray-900">
    @csrf
    @method('PUT') <!-- This ensures the request is sent as a PUT request -->

    <h2 class="text-2xl font-bold text-center mb-6 text-blue-700 dark:text-blue-400">🎳 Bowling Reservering Bewerken</h2>

    
    <div class="mb-4">
        <label for="lane_number" class="block text-gray-700 dark:text-gray-300 font-semibold">Baan Nummer</label>
        <input type="number" name="lane_number" id="lane_number" value="{{ old('lane_number', $reservation->Number) }}"
            class="w-full px-4 py-2 border rounded-lg dark:bg-gray-800 dark:text-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
            @error('lane_number')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
    </div>

    <div class="flex justify-end">
        <button type="submit"
            class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-6 py-2 rounded-full shadow-lg hover:from-blue-600 hover:to-blue-800 dark:hover:from-blue-700 dark:hover:to-blue-900 transform hover:scale-105 transition duration-300">
            Opslaan 🎳
        </button>
    </div>
</form>
</x-app-layout>