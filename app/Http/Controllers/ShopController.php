<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameRequest;
use App\Models\Games;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Intervention\Image\ImageManagerStatic as Image;
use Spatie\Image\Image as Guliy;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\Console\Input\Input;

class ShopController extends Controller
{

    public function getProduct()
    {
        $games = Games::all();
        $orders = Orders::all();
        return view('pages.table_list', ['games' => $games,'orders'=>$orders]);
    }

    public function edit(Games $game)
    {
        return view('shop.edit', ['game' => $game]);
    }

    public function save(GameRequest $request, Games $game)
    {


        $game->name = $request->name;
        $game->discription = $request->discription;
        $game->price = $request->price;
        $game->category = $request->category;



        if (!empty($request->picture)) {
            Image::make($_FILES['picture']['tmp_name'])
                ->save('C:\progs\OpenServer\domains\shop\public\img\cover\\' . $_FILES['picture']['name']);
            $game->picture = $_FILES['picture']['name'];
        }

        $game->save();


        return redirect()->route('table');
    }

    public function delete(Request $request)
    {

        $game = Games::query()->find($request->id)->delete();

        return redirect()->route('table');
    }

    public function gameAdd(GameRequest $request)
    {

        $game = new Games();

        $game->name = $request->name;
        $game->discription = $request->discription;
        $game->price = $request->price;
        $game->category = $request->category;

        if ($request->picture) {
            Image::make($_FILES['picture']['tmp_name'])
                ->save('C:\progs\OpenServer\domains\shop\public\img\cover\\'
                    . $_FILES['picture']['name']);
            $game->picture = $_FILES['picture']['name'];
        }

        $game->save();


        return redirect()->route('table');
    }

    public function picture(Request $request)
    {
        $game = Games::all()->find($request->id);

        $response = Image::make('C:\progs\OpenServer\domains\shop\public\img\cover\\'.$game->picture);


        return $response->response();

    }
}
