<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{

    public function index()
    {
        //dd('index');
        $users = User::all();
        return view('admin.users.index', ['viewusers' => $users]);
    }

    public function create()
    {
        return view('admin.users.create ');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' =>'required|email|unique:users',
            'password' => 'required',
            'avatar' => 'nullable|image'
        ]);

        $user = User::add($request->all());
        $user->uploadAvatar($request->file('avatar'));
        return redirect()->route('users.index');


    }

    public function show($id)
    {
        dd('show');
    }

    public function edit($id)
    {
        //dd('edit');
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {

        $user = User::find($id);
        //dd($request, $id);

        $this->validate($request, [
            'name' => 'required',
            'email' =>[
                'required',
                'email',
                Rule::unique('users')->ignore($user->id)
            ],
            'avatar' => 'nullable|image',
        ]);
        //dd($request->file('avatar'));
        $user->edit($request->all());

        dd($request->all(), $request->file('avatar') );
        $user->uploadAvatar($request->file('avatar'));
        return redirect()->route('users.index');

    }

    public function destroy($id)
    {
        User::find($id)->remuv();
        return redirect()->route('users.index');
    }
}
