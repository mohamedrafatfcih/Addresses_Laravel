{!! Form::open(['route' => ['save_translation_form', 'id' => $countryObj->id]]) !!}

<h3> Country name : {{$countryObj->country_name }} </h3>
{!!  Form::label('country_translation', 'Country translation :') !!}
{!! Form::text('country_translation') !!}

{!!  Form::label('translation_language', 'Translation Language :') !!}
{!! Form::text('translation_language') !!}

{!!   Form::submit('Add') !!}
{!! Form::close() !!}

