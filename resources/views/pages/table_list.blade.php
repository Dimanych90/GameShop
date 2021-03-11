@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Table List')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">The list of games</h4>
            <p class="card-category"> Here is the list of games</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    ID
                  </th>
                  <th>
                    Game
                  </th>
                  <th>
                    Discription
                  </th>
                  <th>
                    Price
                  </th>
                  <th>
                      Category
                  </th>
                  <th>
                      Picture
                  </th>

                <th colspan="2" align="Center">
                    Action
                </th>
                </thead>
                  @foreach($games as $game)
                <tbody>
                  <tr>
                    <td>
                    {{$game->id}}
                    </td>
                    <td>
                    {{$game->name}}
                    </td>
                      <td>
                    {{$game->discription}}
                    </td>
                    <td class="text-primary">
                    {{$game->price}}
                    </td>
                      <td class="text-primary">
                    {{$game->category}}
                    </td>
                      <td>
{{--                          {{route('shop.picture',['picture' => $game->picture])}}--}}
{{--                          ->first()->getUrl('thumb')--}}
{{--                          \App\Models\Games::last()--}}
                          <img src="../public/img/cover/{{$game->picture}}" height="100" width="100">
                      </td>
                      <td>
                          <a href="{{route('shop.edit',['game' => $game])}}">edit</a>
                      </td>
                      <td>
                          <a href="{{route('shop.delete',['id'=>$game->id])}}">delete</a>
                      </td>
                      @endforeach
                  </tr>

                </tbody>
                      <a href="{{route('shop.add')}}"><b>Add game</b></a>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="card card-plain">
          <div class="card-header card-header-primary">
            <h4 class="card-title mt-0">The list of orders</h4>
            <p class="card-category"> Here is the list of orders from the last</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead class="">
                  <th>
                    ID
                  </th>
                  <th>
                    Name Of game
                  </th>
                  <th>
                    Email of client
                  </th>
                  <th>
                    User id
                  </th>
                  <th>
                    Price
                  </th>
                  <th>
                    Picture
                  </th>
                </thead>
                <tbody>
                @foreach($orders as $order)
                  <tr>
                    <td>
                     {{$order->id}}
                    </td>
                    <td>
                      {{$order->nameofthegame}}
                    </td>
                    <td>
                      {{$order->email}}
                    </td>
                      <td>
                          {{$order->user_id}}
                      </td>
                    <td>
                      {{$order->price}}
                    </td>
                    <td>
                      <img src="/public/img/cover/{{$order->picture}}" width="100" height="100">
                    </td>
                  </tr>
                </tbody>
                  @endforeach
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
