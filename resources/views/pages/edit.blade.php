<!-- edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier une adresse') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('adresses.update', $adresse->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Numéro de rue -->
                        <div>
                            <x-label for="numero_de_rue" :value="__('Numéro de rue')" />
                            <x-input id="numero_de_rue" class="block mt-1 w-full" type="text" name="numero_de_rue" :value="$adresse->numero_de_rue" required />
                        </div>

                        <!-- Rue -->
                        <div>
                            <x-label for="rue" :value="__('Rue')" />
                            <x-input id="rue" class="block mt-1 w-full" type="text" name="rue" :value="$adresse->rue" required />
                        </div>

                        <!-- Ville -->
                        <div class="mt-4">
                            <x-label for="ville" :value="__('Ville')" />
                            <x-input id="ville" class="block mt-1 w-full" type="text" name="ville" :value="$adresse->ville" required />
                        </div>

                        <!-- Code Postal -->
                        <div class="mt-4">
                            <x-label for="code_postal" :value="__('Code Postal')" />
                            <x-input id="code_postal" class="block mt-1 w-full" type="text" name="code_postal" :value="$adresse->code_postal" required />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Enregistrer') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
