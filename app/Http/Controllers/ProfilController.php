<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{



    public function index() {
        $user = auth()->user();

        $status = $user->isLibrarian() ? 'Librarian' : 'Reader';


        return view('user.profil', [
            'name' => $user->name,
            'email' => $user->email,
            'status' => $status,
        ]);
    }
}
