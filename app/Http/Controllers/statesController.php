<?php

namespace App\Http\Controllers;

use App\Country;
use App\State;
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
        return view('state.states',$arr);
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
        return view('state.show_state', $arr);

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
