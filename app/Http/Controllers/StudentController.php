<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
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

        $response = $client->request('GET', '/api/students?client='.env('CLIENT'));
        $contents = json_decode($response->getBody());
        // var_dump($contents);
        return view('students.index', compact('contents'));
        // return view('companies.index', compact('companies'));
    }

    public function store(Request $request)
    {
        // var_dump($request);
        $fields = $request->validate([
            'studName'=>'required',
            'studCardID'=>'required',
            'studClassID'=>'required',
            'studBatchID'=>'required',
            'studGuardName'=>'required',
            'studDoB'=>'required',
            'studEmgcPhone1'=>'required',
            'studEmgcPhone2'=>'required',
            'SchoolEmgcCall'=>'required',
            'studKey'=>'required',
            'studStatus'=>'required',
            // 'studImage' => 'required'
        ]);

        // Store Image
        // $imageName = 'tstud.'.$request->studImage->extension();

        // Public Folder
        // $request->studImage->move(public_path('/tmp'), $imageName);

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
        $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
        $studKey = substr(str_shuffle($data), 0, 30);

        $response = $client->request('POST', "/api/students?studCardID=".$fields['studCardID']."&studName=".$fields['studName']."&studClassID=".$fields['studClassID']."&studBatchID=".$fields['studBatchID']."&studDoB=".$fields['studDoB']."&studGuardName=".$fields['studGuardName']."&studEmgcPhone1=".$fields['studEmgcPhone1']."&studEmgcPhone2=".$fields['studEmgcPhone2']."&studStatus=1&studKey=".$studKey."&SchoolEmgcCall=".$fields['SchoolEmgcCall']."&studStatus=".$fields['studStatus'].'&client='.env('CLIENT'));
        
        $contents = json_decode($response->getBody());

        return redirect('/dashboard/students');
    }

    public function show($id, Request $request)
    {
        // $studloyee = Empents::find($id);
        // if ($studloyee == Null){
        //     return response('Employee with ID:'.$id.' not found.', 404)
        //         ->header('Content-Type', 'text/plain');
        // }
        // return $studloyee;

        $headers = [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.Session::get('key'),
        ];

        $client = new Client([
            "base_uri" => "https://idserver.kbtc.edu.mm",
            // "base_uri" => "http://127.0.0.1:8000",
            "headers" => $headers
        ]);
        
        $response = $client->request('GET', "/api/students/".$id.'?client='.env('CLIENT'));
        $contents = json_decode($response->getBody());
        // return redirect('/dashboard/students/$id');
        return view('students.details', compact('contents'));
    }

    // public function update(Request $request, $id)
    // {
    //     $Employee = Empents::find($id);
    //     $Employee->update($request->all());
    //     return $Employee;
    // }

    // public function destroy($id)
    // {
    //     $studloyee = Empents::destroy($id);
    //     if ($studloyee == 1){
    //         return response('Employee with ID:'.$id.' successfully deleted', 200)
    //             ->header('Content-Type', 'text/plain');
    //     }
    //     else{
    //         return response('Employee with ID:'.$id.' was not deleted', 404)
    //             ->header('Content-Type', 'text/plain');
    //     }
    // }

    public function qrshow($studCardID, Request $request)
    {
        $headers = [
            'Accept' => 'application/json',
        ];

        $client = new Client([
            "base_uri" => "https://idserver.kbtc.edu.mm",
            // "base_uri" => "http://127.0.0.1:8000",
            "headers" => $headers
        ]);
        
        $response = $client->request('GET', "/api/students/search/".$studCardID."?studKey=".$request->studKey.'&client='.env('CLIENT'));
        $contents = json_decode($response->getBody());

        return view('students.qrview', compact('contents'));
    }
}
