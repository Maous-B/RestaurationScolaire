![image](https://github.com/Maous-B/RestaurationScolaire/assets/79797065/c0216616-9b2e-476c-bd1a-69c80c403196)
<p align="center">
RestaurationScolaire est un projet en Laravel <img width=40px height=40px src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/laravel/laravel-original.svg" /> de fin d'année qui consiste à faire des réservations pour la cantine
</p>

## Documentation
### UserController.php

Permet de récupérer l'argent sur le compte de l'utilisateur et le stocker
```php
class UserController extends Controller
{

    public function store(Request $request)
    {
        $user =new User() ;
        $user->solde = $request->get('amount') ;
        $user->save() ;

    }

    public function update(Request $request, string $id)
    {
        $utilisateur = User::findOrFail($id);
        $utilisateur->solde += $request->get('amount');
        $utilisateur->save();

        return redirect(route('dashboard'));
    }
}
```
### ReservationController.php

Système de réservation (Ajout de réservation / suppression
```php
class ReservationController extends Controller
{

    public function index()
    {
        $userReservations = Reservation::where('user_id', auth()->id())->get();
        return view('reservations.index', compact('userReservations'));
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'reservation_day' => 'required',
            'reservation_month' => 'required',
            'reservation_year' => 'required',
        ]);

        // Créer une nouvelle instance de réservation
        $reservation = new Reservation();

        // Formatage de la date à partir des données du formulaire
        $date = $request->reservation_year . '-' . $request->reservation_month . '-' . $request->reservation_day;

        $existingReservation = Reservation::where('user_id', auth()->id())
            ->where('date', $date)
            ->first();

        if ($existingReservation) {
            return back()->with('error', 'Vous avez déjà une réservation pour ce jour.');
        }


        // Remplir les données de la réservation
        $reservation->user_id = auth()->id(); // Utilisateur connecté
        $reservation->date = $date;

        // Enregistrer la réservation dans la base de données
        $reservation->save();

        // Créditer le compte de l'utilisateur de 3€
        $user = Auth::user(); // Récupérer l'utilisateur authentifié
        $user->solde -= 3.0;
        $user->save();

        // Rediriger avec un message de succès
        return redirect(route('dashboard'));
    }

    public function destroy($id)
    {
        // Trouver la réservation à supprimer
        $reservation = Reservation::findOrFail($id);

        // Vérifier si l'utilisateur peut supprimer cette réservation (optionnel)
        // if ($reservation->user_id != auth()->id()) {
        //     return back()->with('error', 'Vous n\'êtes pas autorisé à supprimer cette réservation.');
        // }

        // Supprimer la réservation
        $reservation->delete();

        $user = Auth::user(); // Récupérer l'utilisateur authentifié
        $user->solde += 3.0;
        $user->save();

        // Rediriger avec un message de succès
        //return redirect()->route('dashboard')->with('success', 'La réservation a été supprimée avec succès.');
        return redirect(route('dashboard'));
    }
}
```
