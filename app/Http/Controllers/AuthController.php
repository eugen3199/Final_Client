<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $headers = [
            'Content-Type' => 'application/json',
        ];

        $client = new Client([
            "base_uri" => "https://idserver.kbtc.edu.mm",
            "headers" => $headers
        ]);
        $response = $client->request('POST', "/api/login?email=".$fields['email']."&password=".$fields['password']);
        $contents = json_decode($response->getBody());
        var_dump($contents);
        Session::put('key', $contents->token);
        return redirect('/dashboard');
    }
}
