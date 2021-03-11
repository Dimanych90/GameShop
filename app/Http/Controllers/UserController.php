<?php

namespace App\Http\Controllers;

use App\Models\Games;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param \App\Models\User $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    public function userOrder(Request $request)
    {
       $user_id = session('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d');
       $user = User::all()->find($user_id);
       $game = Games::all()->find($request->id);
       return view('shop.form',['user'=>$user,'game'=>$game]);
    }
}
