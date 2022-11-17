<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if(Session::has('fail'))
    <span>{{Session::get('fail')}}</span>
    @endif
    <form action="{{route('saveList')}}" method="post">
    @csrf
        <input type="text" name="name" placeholder="Enter name">
        <span>@error('name') {{$message}} @enderror</span>
        <br>
        <input type="email" name="email" placeholder="Enter email">
        <span>@error('email') {{$message}} @enderror</span>
        <br>
        <input type="password" name="password" placeholder="Enter password">
        <span>@error('password') {{$message}} @enderror</span>
        <br>
        <button type="submit">Sign In</button>
    </form>
</body>
</html>