@extends('layout.dashboard')
@if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>

@endif


@section('add_state')
<form action="{{route('states.store')}}" method="post">
    {{csrf_field()}}

    State Name : <input type="text" name="state_name">
    Country :
    <select name="country">
        @foreach($countries as $country)

            <option value="{{$country->id}}">{{$country->country_name}}</option>
        @endforeach
    </select>

    <input type="submit" value="Add state">
</form>

{!! link_to_route('states.index', $title = "All States", $parameters = [], $attributes = []) !!}

@endsection