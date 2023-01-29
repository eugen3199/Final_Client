<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TestController extends Controller
{
    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // $client = new Client();
        // $response = $client->post('https://idserver.kbtc.edu.mm/api/login', [
        //     'auth' => [
        //         $fields['email'], 
        //         $fields['password']
        //     ]
        // ]);

        // $response = $client->request('POST', 'https://idserver.kbtc.edu.mm/api/login', [
        //     // 'email' => $fields['email'],
        //     // 'password' => $fields['password']
        //     'email' => 'john1234@gmail.com',
        //     'password' => 'john123'
        // ]);
        $client = new Client(["base_uri" => "https://idserver.kbtc.edu.mm"]);
        $response = $client->post("/api/login?email=".$fields['email']."&password=".$fields['password']);
        // return dd($response->getBody());
        // $result = json_decode($response,true);
        $contents = (string) $response->getBody();
        echo $fields['email'].', '.$fields['password'];
        var_dump($contents);
    }
    
}