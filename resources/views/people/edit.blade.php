<x-app-layout>
    <body class="bg-gray-100 text-gray-800">
        <div class="container mx-auto py-8">
            <h1 class="text-bordeaux text-3xl font-bold text-center mb-6">Klant Bewerken</h1>

            <!-- Bericht weergeven als een sessie een 'success'-bericht bevat -->
            @if(session()->has('success'))
                <div class="bg-green-100 text-green-800 border border-green-200 p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Error messages -->
            @if($errors->any())
                <div class="bg-red-100 text-red-800 border border-red-200 p-4 rounded mb-4">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Edit formulier -->
            <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
                <form method="POST" action="{{ route('peopel.update', ['id' => $person->Id]) }}" class="space-y-6">
                    @csrf
                    @method('PATCH') <!-- Deze regel ontbreekt nu -->

                    <!-- Naam velden -->
                    <div class="grid grid-cols-3 gap-4">
                        <div>
                            <label for="FirstName" class="block mb-1 font-semibold">Voornaam</label>
                            <input type="text" name="FirstName" id="FirstName" value="{{ old('FirstName', $person->FirstName) }}" 
                                class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-bordeaux" required >
                        </div>
                        
                        <div>
                            <label for="Infix" class="block mb-1 font-semibold">Tussenvoegsel</label>
                            <input type="text" name="Infix" id="Infix" value="{{ old('Infix', $person->Infix) }}" 
                                class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-bordeaux" required >
                        </div>
                        
                        <div>
                            <label for="LastName" class="block mb-1 font-semibold">Achternaam</label>
                            <input type="text" name="LastName" id="LastName" value="{{ old('LastName', $person->LastName) }}" 
                                class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-bordeaux" required >
                        </div>
                    </div>
                    
                    <!-- Contact informatie -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="Phone" class="block mb-1 font-semibold">Telefoon</label>
                            <input type="text" name="Phone" id="Phone" value="{{ old('Phone', $person->Phone) }}" 
                                class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-bordeaux" required >
                        </div>
                        
                        <div>
                            <label for="Email" class="block mb-1 font-semibold">Email</label>
                            <input type="email" name="Email" id="Email" value="{{ old('Email', $person->Email) }}" 
                                class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-bordeaux" required >
                        </div>
                    </div>
                    
                    <!-- Adult checkbox -->
                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="Adult" value="{{ old('Adult', $person->Adult) ? 'checked' : '' }}"
                                class="rounded border-gray-300 text-bordeaux focus:border-bordeaux focus:ring focus:ring-bordeaux focus:ring-opacity-50" required >
                            <span class="ml-2">Volwassen</span>
                        </label>
                    </div>
                    
                    <!-- Knoppen -->
                    <div class="flex justify-between pt-4">
                        <a href="{{ route('peopel.index') }}" class="bg-white text-black px-6 py-2 rounded-lg shadow-md hover:bg-gray-200 transition duration-300">
                            Terug
                        </a>
                        <button type="submit" class="bg-bordeaux text-black px-6 py-2 rounded-lg shadow-md hover:bg-bordeaux-dark transition duration-300">
                            Opslaan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</x-app-layout>