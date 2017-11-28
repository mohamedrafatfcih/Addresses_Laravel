@extends('base')
@section('content')
<h1> Edit state</h1>

<form action="{{ route('states.update',['state'=>$state->id]) }}" method="POST">
    {{csrf_field()}}
    <input name="_method" type="hidden" value="PUT">

    State Name : <input type="text" value="{{$state->state_name}}" name="state_name" class="form-control">
    country :  <select name="country" class="form-control">
        @foreach($countries as $country)
            <option value="{{$country->id}}">{{$country->country_name}}</option>
        @endforeach

    </select>

    <input type="submit" class="btn btn-primary" value="Edit State">

</form>

@endsection



















