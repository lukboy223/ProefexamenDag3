{{-- filepath: c:\Users\bilag\OneDrive - MBO Utrecht\MBO-U-Leerljaar-2\EXAMEN!!!!!!!!\dag 3\ProefexamenDag3\resources\views\reservations\edit.blade.php --}}

<x-app-layout>

<form action="{{ route('reservations.update', ['id' => $resId]) }}" method="POST" class="bg-gray-100 p-6 rounded-lg shadow-lg dark:bg-gray-900">
    @csrf
    @method('PUT') <!-- This ensures the request is sent as a PUT request -->

    <h2 class="text-2xl font-bold text-center mb-6 text-blue-700 dark:text-blue-400">🎳 Bowling Reservering Bewerken</h2>

    <!-- Hidden field to pass kid count -->
    <input type="hidden" name="kid_count" value="{{ $kidCount ?? 0 }}">
    
    <div class="mb-4">
        <label for="lane_number" class="block text-gray-700 dark:text-gray-300 font-semibold">Baan Nummer</label>
        @if(isset($kidCount) && $kidCount <= 0)
            <p class="text-yellow-600 text-sm mb-2">Let op: Banen 7 en 8 zijn alleen beschikbaar voor reserveringen met kinderen.</p>
        @endif
        <select name="lane_number" id="lane_number" class="w-full px-4 py-2 border rounded-lg dark:bg-gray-800 dark:text-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>  
            <option value="1" @selected(old('lane_number', $reservation->Number) == 1)>1</option>
            <option value="2" @selected(old('lane_number', $reservation->Number) == 2)>2</option>
            <option value="3" @selected(old('lane_number', $reservation->Number) == 3)>3</option>
            <option value="4" @selected(old('lane_number', $reservation->Number) == 4)>4</option>
            <option value="5" @selected(old('lane_number', $reservation->Number) == 5)>5</option>
            <option value="6" @selected(old('lane_number', $reservation->Number) == 6)>6</option>
            <option value="7" @selected(old('lane_number', $reservation->Number) == 7) @if(isset($kidCount) && $kidCount <= 0) disabled @endif>7 @if(isset($kidCount) && $kidCount <= 0) (Alleen voor reserveringen met kinderen) @endif</option>
            <option value="8" @selected(old('lane_number', $reservation->Number) == 8) @if(isset($kidCount) && $kidCount <= 0) disabled @endif>8 @if(isset($kidCount) && $kidCount <= 0) (Alleen voor reserveringen met kinderen) @endif</option>
        </select>
    
        @error('lane_number')
            <div class="text-red-500 text-sm mt-2 error-message transition-opacity duration-10000">{{ $message }}</div>
        @enderror
    </div>

    <div class="flex justify-end">
        <button type="submit"
            class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-6 py-2 rounded-full shadow-lg hover:from-blue-600 hover:to-blue-800 dark:hover:from-blue-700 dark:hover:to-blue-900 transform hover:scale-105 transition duration-300">
            Opslaan 🎳
        </button>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get all error messages
        const errorMessages = document.querySelectorAll('.error-message');
        
        // For each error message, start the fade out process
        errorMessages.forEach(function(errorMessage) {
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