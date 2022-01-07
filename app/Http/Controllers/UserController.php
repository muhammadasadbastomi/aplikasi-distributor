<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();

        return view('admin.user.index', compact('data'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $req)
    {
        $input = $req->all();

        $input['password'] = Hash::make($req->password);
        if ($req->foto) {
            $name = $req->file('foto')->getClientOriginalName();

            $req->file('foto')->storeAs('public/user',$name);
            $input['foto'] = $name;
        }
// dd($input);
        $data = User::create($input);

        return redirect()->route('admin.user.index')->withSuccess('Data berhasil disimpan');
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function update(User $user, Request $req)
    {
        $input = $req->except('password','foto');

        if ($req->password) {
            $input['password'] = Hash::make($req->password);
        }
        if ($req->foto) {
            $name = $req->file('foto')->getClientOriginalName();

            $req->file('foto')->store('public/user');
            $input['foto'] = $name;
        }

        $user->update($input);
        return redirect()->route('admin.user.index')->withSuccess('Data berhasil diubah');

    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return back()->withSuccess('Data berhasil dihapus');
        } catch (Exception $exception) {
            return notify()->warning($exception->getMessage());
        }

    }
}
