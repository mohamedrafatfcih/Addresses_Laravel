@extends('base')

@section('content')
    {!! Form::open(['route'=>['save_city_translation_form','id' => $cityObj->id]]) !!}
    <div class="form-group">
        <h3> City Name : {{ $cityObj->city_name }}</h3>

        {!!  Form::label('city_translation', 'City name translation :') !!}
        {!! Form::text('city_translation') !!}


        {!!  Form::label('city_translation_language', 'Translation Language :') !!}
        {!! Form::text('city_translation_language') !!}
    </div>

    {!!   Form::submit('Add') !!}

    {!! Form::close() !!}
@endsection