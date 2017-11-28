@extends('base')
@section('content')

<h1>  show state</h1>

<strong> State name </strong> :   {{$state->state_name}}
<br>
<strong>country name</strong>  :    {{$state->country->country_name}}
<br>
<strong>Translations :</strong>
<br>
<table class="text-center table-bordered">
    <tr>
        <td> Translation </td>
        <td>  Translation Language</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>
@foreach($state->translation as $trans)
<tr>
   <td> {{$trans->translated_to}} </td>
   <td>  {{$trans->trans_lang}} </td>
    <td> <a href="/states/{{$state->id}}/trans/{{$trans->id}}/edit">Edit This Trans</a> </td>
    <td> <a href="/states/{{$state->id}}/trans/{{$trans->id}}/delete">Delete This Trans</a></td>

</tr>

@endforeach

</table>
<a href="/states/trans/{{$state->id}}">Add new translation</a>
<a href="/states/">All States</a>



 @endsection