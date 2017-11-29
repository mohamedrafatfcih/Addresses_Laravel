<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\State;
use App\TranslationCity;
use Illuminate\Http\Request;

class citiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citiesListObj = City::all();
        return $citiesListObj;//view('city.index',['citiesListObj' => $citiesListObj]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stateListObj = State::pluck('state_name','id');


        return view('city.add_city',['stateListObj'=> $stateListObj]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cityObj = new City();
        $cityObj->city_name = $request->input('city_name');
        $cityObj->state_id  = $request->input('city_state');
        $cityObj->save();
        return redirect(route('cities.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cityObj = City::findOrfail($id);

        return $cityObj; //view('city.city_details',['cityObj'=> $cityObj]);
    }

    public function showCityTranslations($id)
    {
        if(is_numeric($id) and $id > 0) {
            $cityObj = City::findOrFail($id);
            $cityObjTranslationobj = $cityObj->translations;
            return $cityObjTranslationobj ;//view('country.country_details',['countryObj' => $countryObj]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cityObj = City::findOrfail($id);
        $stateListObj = State::pluck('state_name','id');
       return view('city.update_city',['stateListObj' => $stateListObj,'cityObj'=>$cityObj]);
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
        $oldCityObj = City::findOrfail($id);
        $oldCityObj->city_name = $request->input('city_name');
        $oldCityObj->state_id = $request->input('city_state');
        $oldCityObj->save();
        return redirect(route('cities.show',['id'=> $oldCityObj->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cityObj = City::findOrfail($id);

        $cityObj->delete();

        redirect(route('cities.index'));
    }


    public function addTranslation($id){
        $cityObj = City::findOrfail($id);
        return view('city.add_translation',['cityObj'=>$cityObj]);
    }

    public function saveTranslation(Request $request,$id){
        $cityObj = City::findOrFail($id);
        $cityTranslationobj = new TranslationCity();
        $cityTranslationobj->source_id = $id;
        $cityTranslationobj->translated_to = $request->input('city_translation');
        $cityTranslationobj->trans_lang = $request->input('city_translation_language');
        $cityTranslationobj->save();

        return redirect(route('cities.show',['id'=>$id]))->with('success', 'A translation has been added');
    }

    public function editTranslation($id,$translation_id){
        $translationObj =  TranslationCity::findOrFail($translation_id);
        return view('city.edit_translation',['translationObj'=>$translationObj]);
    }

    public function saveTranslationEdit(Request $request, $id,$translation_id){
        $oldTranslationObj = TranslationCity::findOrFail($translation_id);
        $oldTranslationObj->translated_to = $request->input('city_translation');
        $oldTranslationObj->trans_lang = $request->input('city_translation_language');
        $oldTranslationObj->save();
        return redirect(route('cities.show',['id'=>$oldTranslationObj->city->id]))->with('success', 'A translation has been updated');

    }

    public function deleteTranslation(Request $request, $id,$translation_id){
        $oldTranslationObj = TranslationCity::findOrFail($translation_id);
        $oldTranslationObj->delete();

        return redirect(route('cities.index'))->with('success', 'A translation has been deleted');

    }


    public function getCityFullPath($city_id){
        $cityObj    = City::findOrfail($city_id);

        $stateObj   = $cityObj->state;
        $countryObj = $cityObj->state->country;




        return ['city'=>$cityObj];


    }


    public function searchCities(Request $request){
        $search_result = array();
        foreach ($request->input('cities_names') as $city){
            $searchObj = City::all()->where('city_name',$city);
            if(count($searchObj) > 0) {
                foreach ($searchObj as $searchResultObj) {
                    $searchResultObj->translations;
                    $cityState = $searchResultObj->state;
                    $cityState->translation;
                    $cityCountry = $cityState->country;
                    $cityCountry->translations;
                    $cityCountry->localPrefixes;
                }


                $search_result[$city] = $searchObj;

            }
        }

        return $search_result;

    }
}
