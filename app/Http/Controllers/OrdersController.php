<?php

namespace App\Http\Controllers;

use App\Mail\OrderIn;
use App\Mail\OrderOut;
use App\Models\Games;
use App\Models\Orders;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrdersController extends Controller
{
    public function orders(Request $request)
    {
//        dd($request);

        $order = new Orders();

        $order->nameofthegame = $request->nameofthegame;
        $order->email = $request->email;
        $order->user_id = $request->user()['id'];
        $order->picture = $request->picture;
        $order->price = $request->price;
        $order->save();
//
        $game = Games::query()->select()->where('name','=',$request->nameofthegame)->get();
        $user = $request->user();
//        dd($user);
//        dd($game);
        Mail::to($request->user())->send(new OrderOut(['game'=>$game[0]]));
        Mail::to('dimanych90@mail.ru')->send(new OrderIn(['user'=>$user,'game'=>$game[0]]));
        return view('mail.sendto',['game'=>$game[0]]);
    }
}
