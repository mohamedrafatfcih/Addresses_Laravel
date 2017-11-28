@extends('base')
@section('states')

<h1> All Sates</h1>
<table class="table-bordered text-center hover">
    <tr>
        <td>State Name </td>
        <td>cities</td>
    </tr>
@foreach($states as $state)
    <tr>
        <td class="label-primary"> {{$state->state_name}} </td>

            @foreach($state->cities as $city)

            <td>   {{$city->city_name}} </td>



    @endforeach


<td>
{!! Form::open(['route' => ['states.destroy',$state->id], 'method' =>'delete']) !!}
{!!  Form::submit('Delete') !!}
{!! Form::close() !!}

</td>
        <td>

{!! link_to_route('states.edit', $title = 'Edit', $parameters = [$state->id], $attributes = []) !!}
        </td>
        <td>

<a href="/states/{{$state->id}}">Show State Details</a>
        </td>
    </tr>
@endforeach

</table>

{!! link_to_route('states.create', $title = 'Add New state', $parameters = [], $attributes = []) !!}

@endsection