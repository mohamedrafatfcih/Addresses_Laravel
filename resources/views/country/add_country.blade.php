
<div class="panel-body">
    @if(\Session::has('success'))
        <div class="alert alert-success">
            {{\Session::get('success')}}
        </div>
    @endif
</div>

<div class="panel-body">
        @if(\Session::has('error'))
                <div class="alert alert-danger">
                        {{\Session::get('error')}}
                </div>
        @endif
</div>


{!! Form::open(['route' => 'counteries.store']) !!}

{!!  Form::label('country_name', 'Country name :') !!}
{!! Form::text('country_name',null, ['required'=>'true']) !!}

{!!  Form::label('country_main_language', 'Main Language :') !!}
{!! Form::text('country_main_language',null, ['required'=>'true']) !!}

{!!  Form::label('country_population', 'Country population :') !!}
{!! Form::text('country_population',null, ['required'=>'true']) !!}

{!!  Form::label('country_area', 'Country Area :') !!}
{!! Form::text('country_area',null, ['required'=>'true']) !!}

{!!  Form::label('country_prefix', 'Country prefix :') !!}
{!! Form::text('country_prefix',null, ['required'=>'true']) !!}

{!!  Form::label('country_digit_num', 'Country number length :') !!}
{!! Form::text('country_digit_num',null, ['required'=>'true']) !!}

{!!  Form::label('country_currency', 'Country currency :') !!}
{!! Form::text('country_currency',null, ['required'=>'true']) !!}



{!!   Form::submit('Add') !!}
{!! Form::close() !!}
