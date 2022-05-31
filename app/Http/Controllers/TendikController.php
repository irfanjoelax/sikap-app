<?php

namespace App\Http\Controllers;

use App\Models\RencanaTendik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TendikController extends Controller
{
    public function index()
    {
        $rencana =  RencanaTendik::where('user_id', Auth::id());
        return view('tendik.home', [
            'totalRencana'  => $rencana->count(),
            'dataRencana'   => $rencana->latest()->get(),
        ]);
    }
}
