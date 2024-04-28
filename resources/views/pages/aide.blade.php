<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Aide') }}
        </h2>
    </x-slot>



    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <h1 class="mt-8 text-2xl font-medium text-gray-900">
                        AIDE : Service WEB restauration scolaire
                    </h1>

                    <p class="mt-6 text-gray-500 leading-relaxed">
                        Ici, vous pourrez recharger votre compte, réserver et changer les informations de votre compte.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <h1 class="mt-8 text-2xl font-medium text-gray-900">
                        Accéder à l’application
                    </h1>


                    <p class="mt-6 text-gray-500 leading-relaxed">
                        Vous accédez à l’application via un lien sur le site de l’établissement ou via le lien que vous avez reçu de l’établissement.
                        <br>
                        Vous devez posséder un login et un mot de passe. Si vous n’en avez pas, faites en la demande par mail auprès de l’établissement.
                        <br>
                        Renseignez votre login et mot de passe et validez.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <h1 class="mt-8 text-2xl font-medium text-gray-900">
                        Réaliser un encaissement par carte bleue 💳
                    </h1>

                    <p class="mt-6 text-gray-500 leading-relaxed">
                        Cliquez sur « Informations » dans le menu.
                        <br>
                        Renseignez le montant et validez.
                        <br>
                        Vous êtes redirigé vers le site de paiement en ligne qui effectue la transaction sécurisée avec la banque.
                        <br>
                        Si l’encaissement est validé, il est enregistré et sera mis à jour dans les 5 minutes dans la base de données de l’établissement.
                        <br>
                        Si votre mail est renseigné, vous recevrez un mail de confirmation de l'encaissement. Pour renseigner votre mail, rendez vous dans le menu “Compte”
                    </p>
                </div>
            </div>
        </div>
    </div>


    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <h1 class="mt-8 text-2xl font-medium text-gray-900">
                        Gérer son compte ⚙️
                    </h1>

                    <p class="mt-6 text-gray-500 leading-relaxed">
                        A partir du menu "Compte" (du menu déroulant de votre nom), vous pouvez :
                        <br>
                        Changer votre nom d'utilisateur
                        <br>
                        Changer votre mot de passe
                        <br>
                        Si vous avez oublié votre nom d'utilisateur ou votre mot de passe, vous devez en demander un nouveau par mail à l'établissement
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
