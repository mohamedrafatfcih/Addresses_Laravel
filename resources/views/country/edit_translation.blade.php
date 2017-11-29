@extends('base')






@section('content')

    {!! Form::open(['route' => ['save_country_translation_edit_form', 'id' => $translationObj->country->id,'translation_id'=>$translationObj->id]]) !!}

    <h3> Country name : {{$translationObj->country->country_name }} </h3>
    {!!  Form::label('country_translation', 'Country translation :') !!}
    {!! Form::text('country_translation',$translationObj->translated_to) !!}

    {!!  Form::label('translation_language', 'Translation Language :') !!}
    {!! Form::text('translation_language',$translationObj->trans_lang) !!}

    {!!   Form::submit('Add') !!}
    {!! Form::close() !!}



@endsection