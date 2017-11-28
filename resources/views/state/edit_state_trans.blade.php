@extends('base')
@section('content')

<h1>Edit State Translation</h1>
<form action="/states/{{$trans_state->source_id}}/trans/{{$trans_state->id}}/edit" method="post">
    {{csrf_field()}}
    <input type="text" name="translated_to" value="{{$trans_state->translated_to}}" class="form-control">
    <input type="text" name="trans_lang" value="{{$trans_state->trans_lang}}" class="form-control">
    <input type="submit" class="btn-primary" value="Edit This Trans">

</form>

    @endsection