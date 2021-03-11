
<h1>{{$game->name}}</h1>
<form method="post" action="{{route("shop.order")}}">
    @csrf
    <input name="nameofthegame" value="{{$game->name}}" placeholder="Название игры">
    <input name="name" value="{{$user->name}}" placeholder="Ваше имя">
    <input name="email" value="{{$user->email}}" placeholder="Ваш email">
    <input name="price" value="{{$game->price}}" placeholder="price">
    <input hidden name="picture" value="{{$game->picture}}">
    <input type="submit" value="Send">
</form>
