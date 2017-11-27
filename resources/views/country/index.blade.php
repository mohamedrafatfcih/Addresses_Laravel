@extends('base')


@foreach ($countryListObj as $country)
 <h3> Country name : </h3>  {{ $country->country_name }}
 <h3> Country Main Language : </h3>  {{ $country->main_lang }}
 <h3> Country population : </h3>   {{ $country->population }}
 <h3> Country area : </h3>  {{ $country->area }}
    _________________________________________________________

@endforeach

@section('content')
    <p>This is my body content.</p>
@endsection