<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class BatchController extends Controller
{
    public function index()
    {
        $headers = [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.Session::get('key'),
        ];

        $client = new Client([
            "base_uri" => "https://idserver.kbtc.edu.mm",
            // "base_uri" => "http://127.0.0.1:8000",
            "headers" => $headers
        ]);

        $response = $client->request('GET', '/api/batches?client='.env('CLIENT'));
        $contents = json_decode($response->getBody());

        $response2 = $client->request('GET', '/api/classes?client='.env('CLIENT'));
        $contents2 = json_decode($response2->getBody());

        return view('batches.index')
                ->with('batches', $contents)
                ->with('classes', $contents2);
    }

    public function store(Request $request)
    {
        // var_dump($request);
        $fields = $request->validate([
            'batchName'=>'required',
            'batchClassID'=>'required'
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
            "base_uri" => "https://idserver.kbtc.edu.mm",
            // "base_uri" => "https://cdae9772-5646-4692-9a84-a96ed727de20.mock.pstmn.io",
            // "base_uri" => "http://127.0.0.1:8000",
            "headers" => $headers
        ]);

        $response = $client->request('POST', "/api/batches?batchName=".$fields['batchName'].'&batchClassID='.$fields['batchClassID'].'&client='.env('CLIENT'));
        
        $contents = json_decode($response->getBody());

        return redirect('/studrelated/batches');
    }
}
