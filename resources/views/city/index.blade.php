@extends('base')
@section('content')
@foreach($citiesListObj as $city)
<h3> City Name :    {{ $city->city_name }} </h3>
 <h3> City State :   {{ $city->state->state_name }} </h3>


@endforeach
@endsection('content')