<?php

namespace App\Http\Controllers;

use App\Country;
use App\State;
use App\TranslationState;
use Illuminate\Http\Request;

class statesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::all();
        $arr = Array('states' => $states);
        return $states; //view('state.states',$arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        $arr = Array('countries' => $countries);
        return view('state.create_state', $arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->isMethod('post')){
           $request->validate([
               $request,
               'state_name'=>'required|max:30|unique:states'
           ]);
             $state = new State();
             $state->state_name = $request->input('state_name');
             $state->country_id = $request->input('country');
             $state->save();
             return redirect(route('states.create'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $state = State::find($id);
        $arr = Array('state' => $state);
        return $state;// view('state.show_state', $arr);

    }

    public function showStateTranslations($id)
    {
        if(is_numeric($id) and $id > 0) {
            $stateObj = State::findOrFail($id);
            $stateObjTranslationobj = $stateObj->translation;
            return $stateObjTranslationobj ;
        }
    }


    public function add_trans(Request $request, $id){
        $state = State::find($id);
        if($request->isMethod('post')){
            /*$request->validate([
                $request,
                ['translated_to' => 'requried|max:30|unique:translations_states',
                    'trans_lang' => 'required']
            ]);*/

            $trans_state = new TranslationState();
            $trans_state->translated_to = $request->input('translated_to');
            $trans_state->trans_lang = $request->input('trans_lang');
            $trans_state->source_id = $id;
            $trans_state->save();

        }
        return view('state.add_trans_state',['state'=>$state]);

    }


    public function edit_state_trans(Request $request, $state_id , $id){
        $trans_state = TranslationState::find($id);
        $arr = Array('trans_state' => $trans_state);
        if($request->isMethod('post')){
            $trans_state->translated_to = $request->input('translated_to');
            $trans_state->trans_lang = $request->input('trans_lang');
            $trans_state->source_id = $state_id;
            $trans_state->save();
            return redirect(route('states.show',['state'=>$state_id]));

        }else{
            return view('state.edit_state_trans',$arr);
        }

    }
    public function delete_trans_state($state_id, $id){
        $trans_state = TranslationState::find($id);
        $trans_state->delete();
        return redirect(route('states.show',['state'=>$state_id]));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $state = State::find($id);
        $countries = Country::all();
        $arr = Array('state' => $state, 'countries' => $countries);
        return view('state.edit_state', $arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $state = State::find($id);
            $state->state_name =  $request->input('state_name');
            $state->country_id =  $request->input('country');
            $state->save();
            return redirect(route('states.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $state = State::find($id);
        $state->delete();
        return redirect(route('states.index'));
    }

}
