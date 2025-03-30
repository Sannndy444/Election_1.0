<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
        $user = User::whereHas('roles', function ($q) {
            $q->where('name', 'user');
        })
        ->get();

        return view('admin.user.list', compact('user'));
    }

    public function verif()
    {
        $user = User::whereDoesntHave('roles')->get();

        return view('admin.user.verif', compact('user'));
    }

    public function verification($id)
    {
        // dd($id);

        $user = User::find($id);

        if (!$user || $user->roles->isNotEmpty()) {
            return redirect()->back()->with('error', 'This user is already verification.');
        }

        $user->assignRole('user');
        $user->update(['email_verified_at' => Carbon::now()]);

        return redirect()->back()->with('success', 'User verifition succesfullly');
    }

    public function pending()
    {
        return view('pending');
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('admin.user.index')
                            ->with('success', 'User delete successfully');
        } catch (\Exception $e) {
            return redirect()->route('admin.user.index')
                            ->with('error', 'User delete error.');
        }
    }
}
