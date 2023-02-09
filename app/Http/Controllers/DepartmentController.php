<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class DepartmentController extends Controller
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

        $response = $client->request('GET', '/api/departments?client='.env('CLIENT'));
        $contents = json_decode($response->getBody());
        // var_dump($contents);
        return view('departments.index', compact('contents'));
        // return view('companies.index', compact('companies'));
    }

    public function store(Request $request)
    {
        // var_dump($request);
        $fields = $request->validate([
            'deptName'=>'required'
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
            // "base_uri" => "https://cdae9772-5646-4692-9a84-a96ed727de20.mock.pstmn.io",
            // "base_uri" => "http://127.0.0.1:8000",
            "base_uri" => env('BASE_URI'),
            "headers" => $headers
        ]);

        $response = $client->request('POST', "/api/departments?deptName=".$fields['deptName'].'&client='.env('CLIENT'));
        
        $contents = json_decode($response->getBody());

        return redirect('/emprelated/departments');
    }
}
