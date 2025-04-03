<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Election;
use App\Models\Vote;

class UserElectionController extends Controller
{
    public function active()
    {
        $user = Auth::user();

        $election = Election::whereDoesntHave('votes', function ($q) use ($user) {
            $q->where('user_id', $user->id);
        })
        ->with('candidatesOne', 'candidatesTwo')
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
        $user = Auth::user();

        $election = Election::whereHas('votes', function ($q) use ($user) {
                $q->where('user_id', $user->id);
            })
            ->with('candidatesOne', 'candidatesTwo')
            ->get();

            // dd($election);
        return view('user.election.history', compact('election'));
    }

    public function vote($id)
    {
        // dd($id);

        $user = Auth::user();

        $election = Election::with('candidatesOne', 'candidatesTwo')
                            ->where('id', $id)->first();

        // dd($election->toArray());

        return view('user.votes.create', compact('election'));
    }

    public function voteStore(Request $request)
    {
        // dd($request->toArray());
        $user = Auth::user();
        $userId = $user->id;
        // dd($user->id);

        Vote::create([
            'user_id' => $userId,
            'election_id' => $request->electionId,
            'candidate_id' => $request->candidate,
        ]);

        return redirect()->route('user.election.active')
                        ->with('success', 'Votes Successfullly');
    }
}
