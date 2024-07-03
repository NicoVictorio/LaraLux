<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $this->authorize('menu-permission', $user);

        $members = User::join('transactions', 'users.id', '=', 'transactions.user_id')
            ->where('users.role', 'pembeli')
            ->select('users.*')
            ->distinct()
            ->get();
        return view('member.index', compact('members'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        $this->authorize('delete-permission', $user);

        $member = User::find($id);
        return view('member.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Auth::user();
        $this->authorize('delete-permission', $user);

        $member = User::find($id);
        $poin = $request->poin;
        $member->poin = $poin;
        $member->save();
        return redirect()->route('membership');
    }

    public function deleteMembership(string $id)
    {
        $user = Auth::user();
        $this->authorize('delete-permission', $user);

        $member = User::find($id);
        $member->poin = 0;
        $member->save();
        return redirect()->route('membership')->with('status', 'Success delete membership!');
    }
}
