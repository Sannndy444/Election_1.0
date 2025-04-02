<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;

class UserCandidateController extends Controller
{
    public function index()
    {
        $candidate = Candidate::all();

        return view('user.candidate.list', compact('candidate'));
    }
}
