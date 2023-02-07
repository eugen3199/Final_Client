<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class ClassController extends Controller
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

        $response = $client->request('GET', '/api/classes?client='.env('CLIENT'));
        $contents = json_decode($response->getBody());
        // var_dump($contents);
        return view('classes.index', compact('contents'));
        // return view('companies.index', compact('companies'));
    }

    public function store(Request $request)
    {
        // var_dump($request);
        $fields = $request->validate([
            'className'=>'required',
            'prefixName'=>'required',
        ]);

        $headers = [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.Session::get('key'),
        ];

        $client = new Client([
            "base_uri" => "https://idserver.kbtc.edu.mm",
            // "base_uri" => "http://127.0.0.1:8000",
            "headers" => $headers
        ]);
 
        $response = $client->request('POST', "/api/classes?className=".$fields['className']."&prefixName=".$fields['prefixName']."&client=".env('CLIENT'));
        
        $contents = json_decode($response->getBody());

        return redirect('/studrelated/classes');
    }

    // public function update(Request $request, $id)
    // {
    //     $Employee = Employees::find($id);
    //     $Employee->update($request->all());
    //     return $Employee;
    // }

    // public function destroy($id)
    // {
    //     $employee = Employees::destroy($id);
    //     if ($employee == 1){
    //         return response('Employee with ID:'.$id.' successfully deleted', 200)
    //             ->header('Content-Type', 'text/plain');
    //     }
    //     else{
    //         return response('Employee with ID:'.$id.' was not deleted', 404)
    //             ->header('Content-Type', 'text/plain');
    //     }
    // }
}
