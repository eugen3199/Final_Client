<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class CampusController extends Controller
{
    public function index()
    {
        $headers = [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.Session::get('key'),
        ];

        $client = new Client([
            // "base_uri" => "https://idserver.kbtc.edu.mm",
            // "base_uri" => "http://127.0.0.1:8000",
            "base_uri" => env('BASE_URI'),
            "headers" => $headers
        ]);

        $response = $client->request('GET', '/api/campuses?client='.env('CLIENT'));
        $contents = json_decode($response->getBody());
        // var_dump($contents);
        return view('campuses.index')
            ->with('campuses', $contents);
        // return view('companies.index', compact('companies'));
    }

    public function store(Request $request)
    {
        // var_dump($request);
        $fields = $request->validate([
            'campusName'=>'required'
        ]);

        // Store Image
        // $imageName = 'temp.'.$request->empImage->extension();

        // Public Folder
        // $request->empImage->move(public_path('/tmp'), $imageName);

        // // var_dump($fields);

        $headers = [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.Session::get('key'),
        ];

        $client = new Client([
            // "base_uri" => "https://idserver.kbtc.edu.mm",
            // "base_uri" => "http://127.0.0.1:8000",
            "base_uri" => env('BASE_URI'),
            "headers" => $headers
        ]);

        $response = $client->request('POST', "/api/campuses?campusName=".$fields['campusName'].'&client='.env('CLIENT'));
        
        $contents = json_decode($response->getBody());

        return redirect('/emprelated/campuses');
    }
}
