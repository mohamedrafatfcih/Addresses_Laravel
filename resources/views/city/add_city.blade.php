@extends('base')

@section('content')
{!! Form::open(['route'=>'cities.store']) !!}
<div class="form-group">

    {!!  Form::label('city_name', 'City name :') !!}
    {!! Form::text('city_name') !!}


    {!!  Form::label('city_state', 'City state :') !!}
    {!! Form::select('city_state', $stateListObj) !!}
</div>

{!!   Form::submit('Add') !!}

{!! Form::close() !!}
@endsection