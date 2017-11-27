<div class="panel-body">
    @if(\Session::has('success'))
        <div class="alert alert-success">
            {{\Session::get('success')}}
        </div>
    @endif
</div>



{!! Form::open(['route' => ['counteries.update',$countryObj->id],'method'=>'put']) !!}

{!!  Form::label('country_name', 'Country name :') !!}
{!! Form::text('country_name', $countryObj->country_name) !!}

{!!  Form::label('country_main_language', 'Main Language :') !!}
{!! Form::text('country_main_language' , $countryObj->main_lang ) !!}

{!!  Form::label('country_population', 'Country population :') !!}
{!! Form::text('country_population' , $countryObj->population ) !!}

{!!  Form::label('country_area', 'Country Area :') !!}
{!! Form::text('country_area' , $countryObj->area) !!}

{!!   Form::submit('Update') !!}
{!! Form::close() !!}
