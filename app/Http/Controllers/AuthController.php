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
            // "base_uri" => "http://127.0.0.1:8000",
            "headers" => $headers
        ]);
        $response = $client->request('POST', "/api/login?email=".$fields['email']."&password=".$fields['password'].'&client='.env('CLIENT'));
        $contents = json_decode($response->getBody());
        var_dump($contents);
        Session::put('key', $contents->token);
        return redirect('/dashboard');
    }

    public function logout(Request $request)
    {
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer '.Session::get('key'),
        ];

        $client = new Client([
            "base_uri" => "https://idserver.kbtc.edu.mm",
            // "base_uri" => "http://127.0.0.1:8000",
            "headers" => $headers
        ]);

        $response = $client->request('POST', "/api/logout");
        $contents = json_decode($response->getBody());

        return redirect('/login');
    }
}
