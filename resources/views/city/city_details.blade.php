@extends('base')

@section('content')
    <h3> City Name  : {{ $cityObj->city_name }}</h3>
    <h3> City State : {{ $cityObj->state->state_name }}</h3>



    <h3> Translation :</h3>

    @foreach ($cityObj->translations as $translation)
        <p> {{$translation->translated_to }}
            {{$translation->trans_lang }}</p>
    @endforeach

@endsection
