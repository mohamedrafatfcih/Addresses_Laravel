<?php
/**
 * Created by PhpStorm.
 * User: ayman-ahmed
 * Date: 30/11/17
 * Time: 11:15 ص
 */

namespace App\Http\Controllers;


class search_filters
{
    public $country_search_actions ;
    public $city_search_actions ;

    function __construct(){
        $this->country_search_actions = array(

            'all'=>function($countryObj){

            $countryObj->translations;
            $countryObj->localPrefixes;
            $stateListObj = $countryObj->states;
            foreach ($stateListObj as $state) {
                $state->translation;
                $citiesListobj = $state->cities;


                foreach ($citiesListobj as $city) {
                    $city->translations;
                }
            }
            return $countryObj;
            },


            'prifix' =>function($countryObj){
                return $countryObj-> prefix;
            },

            'local_prifixes' => function($countryObj){
                return $countryObj->localPrefixes;

            },
            'currency' => function($countryObj){
                return $countryObj->currency;
            },

            'translations'=> function($countryObj){
                return $countryObj->translations;
            },

            'states' => function($countryObj){
                return $countryObj->states;
            },






        );






        $this->city_search_actions = array(

            'all'=>function($cityObj){

                $cityObj->translations;

                $cityState = $cityObj->state;
                $cityCountry = $cityState->country;


                return $cityObj;
            },

            'translations' => function($cityObj){
                return $cityObj->translations;
            },
            'state' => function($cityObj){
                return $cityObj->state;
            },






        );
    }
}