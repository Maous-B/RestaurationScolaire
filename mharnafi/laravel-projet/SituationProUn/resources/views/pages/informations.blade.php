<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Informations') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <h1 class="mt-8 text-2xl font-medium text-gray-900">
                        Porte-Monnaie 👛
                    </h1>

                    <p class="mt-6 text-gray-500 leading-relaxed">
                        Voici le montant de votre porte-monnaie : {{\Illuminate\Support\Facades\Auth::user()->solde}}€
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
                        Paiement 💸
                    </h1>

<!--action="route('banque')"! (mettre le "{" et "}" a la fin et au début de routebanque-->
                    <form method="POST" action="{{url('user/'.\Illuminate\Support\Facades\Auth::user()->id)}}">
                        @method('PUT')
                        @csrf

                        <div class="mt-6">
                            <label for="card_number" class="block text-sm font-medium text-gray-700">Numéro de carte :</label>
                            <input maxlength="16" type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 16)" id="card_number" name="card_number" class="mt-1 p-2 border rounded-md w-full" placeholder="XXXX-XXXX-XXXX-XXXX" required>
                        </div>

                        <div class="mt-6">
                            <label for="expiry_date" class="block text-sm font-medium text-gray-700">Date d'expiration :</label>
                            <input type="text" id="expiry_date" name="expiry_date" class="mt-1 p-2 border rounded-md w-full" placeholder="MM/YY" required>
                        </div>

                        <div class="mt-6">
                            <label for="cvv" class="block text-sm font-medium text-gray-700">CVV :</label>
                            <input maxlength="3" type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 3)" id="cvv" name="cvv" class="mt-1 p-2 border rounded-md w-full" placeholder="XXX" required>
                        </div>

                        <div class="mt-6">
                            <label for="amount" class="block text-sm font-medium text-gray-700">Montant à payer (en €) :</label>
                            <input type="number" id="amount" name="amount" class="mt-1 p-2 border rounded-md w-full" placeholder="Ex : 15" required>
                        </div>

                        <div class="mt-6">
                            <x-button type="submit" class="ml-4">
                                Procéder au paiement
                            </x-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
