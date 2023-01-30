<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class TestController extends Controller
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
        // return dd($response->getBody());
        // $result = json_decode($response,true);
        $contents = json_decode($response->getBody());
        var_dump($contents);
        Session::put('key', $contents->token);
    }

    public function index()
    {
        $headers = [
            'Accept' => 'application/json',
            // 'AccessToken' => ,
            'Authorization' => 'Bearer '.Session::get('key'),
        ];

        $client = new Client([
            "base_uri" => "https://idserver.kbtc.edu.mm",
            "headers" => $headers
        ]);

        // $response = $client->get("api/employees");
        $response = $client->request('GET', '/api/employees');
        $contents = json_decode($response->getBody());
        var_dump($contents);
    }
    
}