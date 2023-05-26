<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use GuzzleHttp;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    // public function test()
    // {
    //     $client = new GuzzleHttp\Client();
    //     $res = $client->get('abt.test/');
    //     $array = json_decode($res->getBody(), true);
    //     dd($array['test']);
    // }
}
