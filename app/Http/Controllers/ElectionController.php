<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Election;
use Illuminate\Support\Facades\Validator;
use App\Events\ElectionStatusUpdated;

class ElectionController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->toArray());

        $election = Election::with('candidatesOne', 'candidatesTwo')->get();

        return view('admin.election.list', compact('election'));
    }

    public function showDetail($id)
    {
        $election = Election::find($id);

        if (!$election) {
            return response()->json(['error' => 'Election not found'], 404);
        }

        return response()->json([
            'id' => $election->id,
            'title' => $election->title,
            'candidate_one' => $election->candidatesOne ? $election->candidatesOne->name : 'No candidate found',
            'candidate_two' => $election->candidatesTwo ? $election->candidatesTwo->name : 'No candidate found',
            'startDate' => $election->start_date ? $election->start_date : 'No start date found',
            'endDate' => $election->end_date ? $election->end_date : 'No end date found',
            'description' => $election->description ? $election->description : 'No description found',
            'status' => $election->status,
        ]);
    }

    public function create()
    {
        $candidate = Candidate::all();

        return view('admin.election.create', compact('candidate'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'photo_election' => 'nullable|image|mimes:png,jpg,jpeg|max:6000',
            'first_candidate' => 'required|exists:candidates,id',
            'second_candidate' => 'required|exists:candidates,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'description' => 'required|string|max:5000',
        ],[
            'title.max' => 'Title input too long.',
            'photo_election.mimes' => 'Image input not supported.',
            'photo_election.max' => 'Size image file too big.',
            'description.max' => 'Description input too long.'
        ]);

            if ($request->first_candidate === $request->second_candidate) {
                return redirect()->route('admin.election.create')
                                ->withErrors(['first_and_second_candidate' => 'The first and second candidates are forbidden to be the same'])
                                ->withInput();
            }

            if ($validator->fails()) {
                $error = $validator->errors();
                return redirect()->route('admin.election.create')
                                ->withErrors($validator)
                                ->withInput();
            }

                if ($request->hasFile('photo_election')) {
                    $photo = $request->file('photo_election');
                    $photoPath = time() . '.' . $photo->getClientOriginalExtension();
                    $photo->storeAs('photo', $photoPath, 'public');
                } else {
                    $photoPath = 'default-election.jpg';
                }

            // dd($request->toArray());

            $election = Election::create([
                'title' => $request->title,
                'photo_election' => $photoPath,
                'candidate_1_id' => $request->first_candidate,
                'candidate_2_id' => $request->second_candidate,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'description' => $request->description,
            ]);

            event(new ElectionStatusUpdated($election));

            return redirect()->route('admin.election.create')->with('success', 'Successfully made the election');
    }

    public function destroy(Election $election)
    {
        // dd($election->toArray());

        try {
            $election->delete();
            return redirect()->route('admin.election.index')->with('success', 'Election delete succesfully');
        } catch (\Exception $e) {
            return redirect()->route('admin.election.index')
                            ->with('error', 'Election Delete error');
        }
    }
}
