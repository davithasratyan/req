<?php

namespace App\Http\Controllers;

use Cassandra\Map;
use http\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        $apiKey = config('app.bing_maps_api_key');

        return view('map', compact('apiKey'));
    }
}

