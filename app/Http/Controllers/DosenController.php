<?php

namespace App\Http\Controllers;

use App\Models\RencanaDosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DosenController extends Controller
{
    public function index()
    {
        $rencana =  RencanaDosen::where('user_id', Auth::id());
        return view('dosen.home', [
            'totalRencana'  => $rencana->count(),
            'dataRencana'   => $rencana->latest()->get(),
        ]);
    }
}
