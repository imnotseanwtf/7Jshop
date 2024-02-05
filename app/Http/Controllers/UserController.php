<?php

namespace App\Http\Controllers;

use App\Enums\UserTypeEnum;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::role(UserTypeEnum::User)->get();

        return view('users.index', compact('users'));
    }

    public function suppliers()
    {
        $users = User::role(UserTypeEnum::Supplier)->get();

        return view('users.suppliers', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        $user->assignRole('staff');

        alert()->success('EMPLOYEE ACCOUNT HAS BEEN ADDED');
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        alert()->success('User has been deleted');
        return redirect()->route('users.index');
    }

    public function approved(User $user)
    {
        $user->status = 3;
        $user->save();

        return view('users.index', compact('user'));
    }
}
