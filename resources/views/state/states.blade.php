@extends('layout.dashboard')


@section('states')

<h1> All Sates</h1>

@foreach($states as $state)
{{$state->state_name}}

<hr>
<h3>cities</h3>
    @foreach($state->cities as $city)

        {{$city->city_name}}
        <br>


    @endforeach



{!! Form::open(['route' => ['states.destroy',$state->id], 'method' =>'delete']) !!}
{!!  Form::submit('Delete') !!}
{!! Form::close() !!}

{!! link_to_route('states.edit', $title = 'Edit', $parameters = [$state->id], $attributes = []) !!}

<br/>
@endforeach

{!! link_to_route('states.create', $title = 'Add New state', $parameters = [], $attributes = []) !!}

@endsection