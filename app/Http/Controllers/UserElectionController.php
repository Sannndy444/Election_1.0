<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Election;
use App\Models\Vote;

class UserElectionController extends Controller
{
    public function active()
    {
        $election = Election::with('candidatesOne', 'candidatesTwo')
                            ->where('status', 'active')
                            ->get();

        // dd($election);

        return view('user.election.active', compact('election'));
    }

    public function draft()
    {
        $election = Election::with('candidatesOne', 'candidatesTwo')
            ->where('status', 'draft')
            ->get();
        return view('user.election.draft', compact('election'));
    }

    public function history()
    {
        return view('user.election.history');
    }
}
