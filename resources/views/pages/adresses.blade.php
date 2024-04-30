<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adresses') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <h1 class="mt-8 text-2xl font-medium text-gray-900">
                        Vos adresses 🏠
                    </h1>

                    <p class="mt-6 text-gray-500 leading-relaxed">
                    <p class="mt-6 text-gray-500 leading-relaxed">
                    @if ($userAdresses->isNotEmpty())
                        <ul>
                            @foreach ($userAdresses as $adresse)
                                <li>
                                    <strong>Numéro de rue:</strong> {{ $adresse->numero_de_rue }}
                                    <strong>Rue:</strong> {{ $adresse->rue }}
                                    <strong>Ville:</strong> {{ $adresse->ville }}
                                    <strong>Code Postal:</strong> {{ $adresse->code_postal }}
                                    <form method="POST" action="{{ route('adresses.destroy', $adresse->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500">Supprimer</button>
                                    </form>
                                    <a href="{{ route('adresses.edit', $adresse->id) }}" class="text-blue-500">Modifier</a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="mt-6 text-gray-500 leading-relaxed">Aucune adresse trouvée.</p>
                        @endif
                        </p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <h1 class="mt-8 text-2xl font-medium text-gray-900">
                        Enregistrer une adresse 📝
                    </h1>

                    <p class="mt-6 text-gray-500 leading-relaxed">
                    <form method="POST" action="{{ route('adresses.store') }}">
                        @method('POST')
                        @csrf
                        <!-- Numéro de rue -->
                        <div>
                            <x-label for="numero_rue" :value="__('Numéro de rue')" />
                            <x-input id="numero_de_rue" class="block mt-1 w-full" type="text" name="numero_de_rue" required />
                        </div>
                        <!-- Rue -->
                        <div>
                            <x-label for="rue" :value="__('Rue')" />
                            <x-input id="rue" class="block mt-1 w-full" type="text" name="rue" required />
                        </div>

                        <!-- Ville -->
                        <div class="mt-4">
                            <x-label for="ville" :value="__('Ville')" />
                            <x-input id="ville" class="block mt-1 w-full" type="text" name="ville" required />
                        </div>

                        <!-- Code Postal -->
                        <div class="mt-4">
                            <x-label for="code_postal" :value="__('Code Postal')" />
                            <x-input id="code_postal" class="block mt-1 w-full" type="text" name="code_postal" required />
                        </div>



                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Enregistrer') }}
                            </x-button>
                        </div>
                    </form>
                    </p>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
