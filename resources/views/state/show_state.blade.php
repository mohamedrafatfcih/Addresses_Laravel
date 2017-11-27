<h1>  show state</h1>

<strong> State name </strong> :   {{$state->state_name}}
<br>
<strong>country name</strong>  :    {{$state->country->country_name}}
<strong>Translations</strong>
@foreach($state->translation as $trans)

    {{$trans->translated_to}}
    <br>
    {{$trans->trans_lang}}


@endforeach