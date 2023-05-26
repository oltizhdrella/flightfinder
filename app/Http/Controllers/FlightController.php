<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use  Illuminate\Validation\Rule;
use GuzzleHttp;
use GuzzleHttp\Exception\BadResponseException;
use Illuminate\Support\Facades\Http;


class FlightController extends Controller
{
    public function searchFlight(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'flightOption'          => 'required',
            'from_place'            => 'required',
            'to_place'              => 'required|different:from_place',
            'depart_date'           => 'required|date',
            'return_date'           => 'required_if:flightOption,==,roundtrip',
            'class_selected'        => 'required'
        ]);


        if($request->flightOption == 'roundtrip')
        {
            if($request->return_date < $request->depart_date)
            {
                $errorInDate = 'Return date should be greater than depart date!';
            }
        }

        if($validator->fails())
        {
            foreach($validator->errors()->all() as $error)
            {
                toastr()->error($error);
            }
            if(isset($errorInDate))
            {
                toastr()->error($errorInDate);
            }
            return Redirect('home');
            
        }else{

            if(isset($errorInDate))
            {
                toastr()->error($errorInDate);
                return Redirect('home');
            }

            if(isset($request->return_date)){
                $url = 'abt.test/api/'.API_TOKEN.'/find/flight?from_place='.str_replace(', ', '-', $request->from_place).
                '&to_place='.str_replace(',', '-', $request->to_place).
                '&depart_date='.$request->depart_date.'&class_selected='.$request->class_selecte.'&return_date='.$request->return_date;
            }else{
                $url = 'abt.test/api/'.API_TOKEN.'/find/flight?from_place='.str_replace(', ', '-', $request->from_place).
                '&to_place='.str_replace(',', '-', $request->to_place).
                '&depart_date='.$request->depart_date.'&class_selected='.$request->class_selected;
            }

            $response = Http::get($url);

            $body = json_decode($response->body(), true);

            return view('flights', compact('body'));
        }
    }
}
