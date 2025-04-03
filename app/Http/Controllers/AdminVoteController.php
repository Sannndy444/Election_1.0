<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Election;
use App\Models\Vote;

class AdminVoteController extends Controller
{
    public function list()
    {
        $election = Election::where('status', '!=', 'draft')
            ->with('candidatesOne', 'candidatesTwo')
            ->get();

            // dd($election);

        return view('admin.votes.list', compact('election'));
    }

    public function detail($id)
    {
        // dd($id);

        $electionId = Election::with('candidatesOne', 'candidatesTwo')
            ->find($id);

        $candidateOneId = $electionId ? $electionId->candidate_1_id : null;
        $candidateTwoId = $electionId ? $electionId->candidate_2_id : null;

        $voteOne = Vote::where('candidate_id',  $candidateOneId)->count();
        $voteTwo = Vote::where('candidate_id',  $candidateTwoId)->count();

        return view('admin.votes.detail', compact('electionId', 'voteOne', 'voteTwo'));
    }
}
