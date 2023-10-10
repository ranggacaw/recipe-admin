<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->first();

        return view('user.edit', compact('user'));
    }

    public function editStore(Request $request)
    {
        $user = User::where('id',$request->id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->update();

        Alert::info('Success', 'User has been Updated!');
        return redirect('user');
    }
    
    public function delete($id) 
    {
        $user = User::where('id', $id )->first();
        $user->delete();

        Alert::warning('Success', 'User has been deleted!');
        return redirect('user');
    }

    public function create()
    {
        return view('user.create');
    }

    public function createStore(Request $request)
    {
        $user = new User;
        $passwordHash = Hash::make($request->password); //untuk rubah password biar secure coy, kalo ga nanti di tolak laravel masuk db


        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $passwordHash;
        $user->save();

        Alert::success('Success', 'User has been created!');
        return redirect('user');
    }
    
}
