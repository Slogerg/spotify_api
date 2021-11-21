<?php

namespace App\Http\Controllers;

use Auth;
use Cache;
use SpotifyWebAPI;
use Session;
use Illuminate\Http\Request;

class SpotifyController extends Controller
{

    public function index()
    {
        $session = new SpotifyWebAPI\Session(
            env('SPOTIFY_CLIENT_ID'),
            env('SPOTIFY_CLIENT_SECRET')
        );

        $session->requestCredentialsToken();
        $accessToken = $session->getAccessToken();
        $api = new SpotifyWebAPI\SpotifyWebAPI();
        $api->setAccessToken($accessToken);

        dd(
            $results = $api->search('gorillaz', 'artist')
        );
    }

}
