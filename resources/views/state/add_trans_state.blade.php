

@extends('base')
@section('content')


<form action="/states/trans/{{$state->id}}" method="POST">
    {{csrf_field()}}
    Taranslation : <input type="text" class="form-control" name="translated_to">
    Translation Lang :  <input type="text" class="form-control" name="trans_lang">
    <input type="submit" value="Add This Trans">
</form>
<h2><a href="/states/">All States</a> </h2>


    @endsection