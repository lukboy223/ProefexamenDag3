{{-- layout --}}
<x-app-layout>

    {{-- title on the top of the screen --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            score aanpassen
        </h2>
    </x-slot>

    @if (session('error'))

    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative w-3/4 m-auto text-center my-6"
        role="alert">
        <h3 class="block sm:inline">{{ session('error') }}</h3>

    </div>
    @endif
    <div class="overflow-x-auto">
        <form action="{{ route('results.update', $result->Id) }} " method="post"
            class="w-3/4 bg-white m-auto mt-5 mb-5 p-5 rounded shadow-md just" style="padding: 1em">
            @method('Patch')
            @csrf

            <label for="AmountPoints">Score</label>
            <input type="number" name="AmountPoints" id="AmountPoints" placeholder="100"
                value="{{ old('AmountPoints', $result->AmountPoints) }}"
                class="w-full p-2 rounded border border-gray-300 dark:border-gray-700 mb-2" required>
            @error('AmountPoints')
            <p class="text-red-500">{{ $message }}</p>
            @enderror

            <button type="submit"
                class="bg-green-700 text-white p-2 rounded hover:bg-green-800 dark:hover:bg-green-900">Opslaan</button>
        </form>

        
    </div>



</x-app-layout>