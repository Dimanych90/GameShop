@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Table List')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Edit games</h4>
                            <p class="card-category"> Here you can edite games</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="{{route('shop.save',['game'=> $game])}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    Name of the game <input name="name" value="{{$game->name}}"><br><br>
                                    @if($errors->has('name'))
                                        <div class="alert alert-danger">{{$errors->first('name')}}</div>
                                    @endif
                                    Discription of the game <textarea name="discription" >{{$game->discription}}</textarea><br><br>
                                    @if($errors->has('discription'))
                                        <div class="alert alert-danger">{{$errors->first('discription')}}</div>
                                    @endif
                                    Price of the game <input name="price" value="{{$game->price}}"><br><br>
                                    @if($errors->has('price'))
                                        <div class="alert alert-danger">{{$errors->first('price')}}</div>
                                    @endif
                                    Category <select name="category" required>
                                        <option value="Action">Action</option>
                                        <option value="RPG">RPG</option>
                                        <option value="Online">Online</option>
                                        <option value="Strategy">Strategy</option>
                                    </select><br><br>
                                    @if($errors->has('category'))
                                        <div class="alert alert-danger">{{$errors->first('category')}}</div>
                                    @endif
                                    Picture <input name="picture" type="file" value="{{$game->picture}}">
                                    @if($errors->has('picture'))
                                        <div class="alert alert-danger">{{$errors->first('picture')}}</div>
                                    @endif


                                    <input type="submit" value="Save">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

@endsection

