<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use Illuminate\Support\Facades\Validator;

class CandidateController extends Controller
{
    public function index()
    {
        $candidates = Candidate::all();

        return view('admin.candidate.list', compact('candidates'));
    }

    public function create()
    {
        return view('admin.candidate.create');
    }

    public function store(Request $request)
    {
        // dd($request->toArray());

        $validator = Validator::make($request->all(), [
            'name_candidate' => 'required|string|max:255',
            'photo_candidate' => 'nullable|image|mimes:jpeg,jpg,png|max:6000',
            'description_candidate' => 'required|string|max:5000',
        ],[
            'name_candidate.max' => 'Name candidate too long',
            'photo_candidate.mimes' => 'File photo not supported',
            'description_candidate.max' => 'Description candidate too long'
        ]);

        // dd($request->photo_candidate);

            if($validator->fails()) {
                $error = $validator->errors();
                return redirect()->route('admin.candidate.create')
                                ->withErrors($error)
                                ->withInput();
            }

                if ($request->hasFile('photo_candidate')) {
                    $photo = $request->file('photo_candidate');
                    $photoPath = time() . '.' . $photo->getClientOriginalExtension();
                    $photo->storeAs('photo', $photoPath, 'public');
                } else {
                    $photoPath = 'default-photo.png';                
                }
                // dd($photoPath);

            Candidate::create([
                'name' => $request->name_candidate,
                'photo' => $photoPath,
                'description' => $request->description_candidate
            ]);

            return redirect()->route('admin.candidate.create')->with('success', 'Candidate add succesfully');
    }

    public function destroy(Candidate $candidate)
    {
        try {
            $candidate->delete();
            return redirect()->route('admin.candidate.index')
                            ->with('success', 'Candidate delete successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.candidate.index')
                            ->with('error', 'Candidate delete error.');
        }
    }
}
