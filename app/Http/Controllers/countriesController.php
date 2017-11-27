<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;

class countriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countryListObj =  Country::all();
        //echo $countryListObj;
        return view('country.index',['countryListObj'=>$countryListObj]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('country.add_country');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_numeric($request->input('country_population')) and is_numeric($request->input('country_population'))) {
            if ($request->input('country_population') > 0 and $request->input('country_population') > 0) {
                $countryObj = new Country();
                $countryObj->country_name = $request->input('country_name');
                $countryObj->population = $request->input('country_population');
                $countryObj->area = $request->input('country_population');
                $countryObj->main_lang = $request->input('country_main_language');
                $countryObj->save();
                return redirect(route('counteries.create'))->with('success', 'New Country has been added');
            }else{
                return redirect(route('counteries.create'))->with('error', 'Area and population should be larger than 0');
            }
        }else{
            return redirect(route('counteries.create'))->with('error', 'Area and population should be numeric values');
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
        if(is_numeric($id) and $id > 0) {
            $countryObj = Country::findOrFail($id);
            return view('country.country_details',['countryObj' => $countryObj]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   if(is_numeric($id) and $id > 0) {
        $countryObj = Country::findOrFail($id);
        return view('country.update_country', ['countryObj' => $countryObj]);
    }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        if(is_numeric($id) and $id > 0) {
            $oldCountryObj = Country::findOrFail($id);
            if (is_numeric($request->input('country_population')) and is_numeric($request->input('country_population'))) {
                if ($request->input('country_population') > 0 and $request->input('country_population') > 0) {
                    $oldCountryObj->country_name = $request->input('country_name');
                    $oldCountryObj->main_lang = $request->input('country_main_language');
                    $oldCountryObj->population = $request->input('country_population');
                    $oldCountryObj->area = $request->input('country_area');
                    $oldCountryObj->save();
                    return redirect(route('counteries.index'))->with('success', 'Country info has been updated');
                }else{
                    return redirect(route('counteries.edit',[$oldCountryObj->id]))->with('error', 'Area and population should be larger than 0');
                }
            }else{
                return redirect(route('counteries.edit',[$oldCountryObj->id]))->with('error', 'Area and population should be numeric values');
            }

            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if(is_numeric($id) and $id > 0) {
            $deletedCountryObj = Country::findOrFail($id);
            $deletedCountryObj->delete();
            return redirect(route('counteries.index'))->with('success', 'Country has been deleted');
        }else{
            return redirect(route('counteries.index'))->with('error', 'Invalid country info');
        }
    }
}
