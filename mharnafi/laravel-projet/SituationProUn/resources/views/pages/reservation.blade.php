<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Réservation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <h1 class="mt-8 text-2xl font-medium text-gray-900">
                        Réservation 🎫
                    </h1>

                    <p class="mt-6 text-gray-500 leading-relaxed">
                        Montant : {{\Illuminate\Support\Facades\Auth::user()->solde}}€
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
                        Vos réservations 📋
                    </h1>

                    <p class="mt-6 text-gray-500 leading-relaxed">
                        @if ($userReservations->isNotEmpty())
                            <ul>
                                @foreach ($userReservations as $reservation)
                                    <li>Date de réservation : {{ $reservation->date }}</li>
                                    <!-- Ajoute d'autres informations de réservation si nécessaire -->
                                @endforeach
                            </ul>
                        @else
                            <p class="mt-6 text-gray-500 leading-relaxed">Aucune réservation trouvée.</p>
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
                        Faire une réservation 📝
                    </h1>

                    <p class="mt-6 text-gray-500 leading-relaxed">
                        <form method="POST" action="{{ route('reservations.store') }}">
                            @method('POST')
                            @csrf

                            <div class="mt-4">
                                <label for="reservation_day" class="block text-sm font-medium text-gray-700">Jour</label>
                                <select id="reservation_day" name="reservation_day" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="">Sélectionnez un jour</option>
                                    @for ($i = 1; $i <= 31; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>

                            <div class="mt-4">
                                <label for="reservation_month" class="block text-sm font-medium text-gray-700">Mois</label>
                                <select id="reservation_month" name="reservation_month" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="">Sélectionnez un mois</option>
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}">{{ \Carbon\Carbon::createFromDate(null, $i)->locale('fr')->isoFormat('MMMM') }}</option>
                                    @endfor
                                </select>
                            </div>

                            <div class="mt-4">
                                <label for="reservation_year" class="block text-sm font-medium text-gray-700">Année</label>
                                <select id="reservation_year" name="reservation_year" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="">Sélectionnez une année</option>
                                    @for ($i = date('Y'); $i <= date('Y')+1; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>

                            <div class="mt-6">
                                <x-button type="submit" class="ml-4">
                                    Procéder à la réservation
                                </x-button>
                            </div>
                        </form>
                    </p>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
