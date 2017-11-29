@extends('base')
@section('content')
    {!! Form::open(['route'=>['cities.update','id'=>$cityObj->id],'method'=>'put']) !!}
    <div class="form-group">

        {!!  Form::label('city_name', 'City name :') !!}
        {!! Form::text('city_name',$cityObj->city_name) !!}


        {!!  Form::label('city_state', 'City state :') !!}
        {!! Form::select('city_state', $stateListObj,$cityObj->state_id) !!}
    </div>

    {!!   Form::submit('update') !!}

    {!! Form::close() !!}

@endsection('content')