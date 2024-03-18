<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use Illuminate\Http\Request;

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

        // Remplir les données de la réservation
        $reservation->user_id = auth()->id(); // Utilisateur connecté
        $reservation->date = $date;

        // Enregistrer la réservation dans la base de données
        $reservation->save();

        // Rediriger avec un message de succès
        return redirect(route('dashboard'));
    }
}
