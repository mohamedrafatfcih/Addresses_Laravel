@extends('base')






@section('content')


<h3> country name          : {{ $countryObj->country_name }}</h3>
<h3> country main Language : {{ $countryObj->main_lang }}</h3>
<h3> country population    : {{ $countryObj->population }}</h3>
<h3> country area          : {{ $countryObj->area }}</h3>

________________________
    <h3> Translation :</h3>

@foreach ($countryObj->translations as $translation)
    <p> {{$translation->translated_to }}
     {{$translation->trans_lang }}</p>
@endforeach


@endsection