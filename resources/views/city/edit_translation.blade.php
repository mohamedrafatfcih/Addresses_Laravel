@extends('base')

@section('content')
    {!! Form::open(['route'=>['save_city_translation_edit_form','id' => $translationObj->city->id,'translation_id'=>$translationObj->id],'method'=>'put']) !!}
    <div class="form-group">
        <h3> City Name : {{ $translationObj->city->city_name }}</h3>

        {!!  Form::label('city_translation', 'City name translation :') !!}
        {!! Form::text('city_translation',$translationObj->translated_to) !!}


        {!!  Form::label('city_translation_language', 'Translation Language :') !!}
        {!! Form::text('city_translation_language',$translationObj->trans_lang) !!}
    </div>

    {!!   Form::submit('Add') !!}

    {!! Form::close() !!}
@endsection