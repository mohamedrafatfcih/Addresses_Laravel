<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit state</title>
</head>
<body>
<h1> Edit state</h1>

<form action="{{ route('states.update',['state'=>$state->id]) }}" method="POST">
    {{csrf_field()}}
    <input name="_method" type="hidden" value="PUT">

    State Name : <input type="text" value="{{$state->state_name}}" name="state_name">
    country :  <select name="country">
        @foreach($countries as $country)
            <option value="{{$country->id}}">{{$country->country_name}}</option>
        @endforeach

    </select>

    <input type="submit" value="Edit State">

</form>

</body>
</html>



















