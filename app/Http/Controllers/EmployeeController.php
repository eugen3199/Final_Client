<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
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

        $response = $client->request('GET', '/api/employees?client='.env('CLIENT'));
        $contents = json_decode($response->getBody());
        // var_dump($contents);
        return view('employees.index', compact('contents'));
        // return view('companies.index', compact('companies'));
    }

    public function store(Request $request)
    {
        // var_dump($request);
        $fields = $request->validate([
            'empName'=>'required',
            'empCardID'=>'required',
            'empPosID'=>'required',
            'empDeptID'=>'required',
            'empJoinDate'=>'required',
            'empNRC'=>'required',
            'empPhone'=>'required',
            'empEmgcPerson'=>'required',
            'empEmgcPhone'=>'required',
            'empCampusID'=>'required',
            // 'empImage' => 'required'
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
        $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
        $empKey = substr(str_shuffle($data), 0, 30);
        // var_dump($empKey);
        $response = $client->request('POST', "/api/employees?empCardID=".$fields['empCardID']."&empName=".$fields['empName']."&empPosID=".$fields['empPosID']."&empDeptID=".$fields['empDeptID']."&empJoinDate=".$fields['empJoinDate']."&empNRC=".$fields['empNRC']."&empPhone=".$fields['empPhone']."&empEmgcPerson=".$fields['empEmgcPerson']."&empEmgcPhone=".$fields['empEmgcPhone']."&empCampusID=".$fields['empCampusID']."&empStatus=1&empKey=".$empKey.'&client='.env('CLIENT'));
        
        $contents = json_decode($response->getBody());

        return redirect('/dashboard/employees');
    }

    public function show($id, Request $request)
    {
        // $employee = Employees::find($id);
        // if ($employee == Null){
        //     return response('Employee with ID:'.$id.' not found.', 404)
        //         ->header('Content-Type', 'text/plain');
        // }
        // return $employee;

        $headers = [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.Session::get('key'),
        ];

        $client = new Client([
            "base_uri" => "https://idserver.kbtc.edu.mm",
            // "base_uri" => "http://127.0.0.1:8000",
            "headers" => $headers
        ]);
        
        $response = $client->request('GET', "/api/employees/".$id.'?client='.env('CLIENT'));
        $contents = json_decode($response->getBody());
        // return redirect('/dashboard/employees/$id');
        return view('employees.details', compact('contents'));
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

    public function qrshow($empCardID, Request $request)
    {
        $headers = [
            'Accept' => 'application/json',
        ];

        $client = new Client([
            "base_uri" => "https://idserver.kbtc.edu.mm",
            // "base_uri" => "http://127.0.0.1:8000",
            "headers" => $headers
        ]);
        
        $response = $client->request('GET', "/api/employees/search/".$empCardID."?empKey=".$request->empKey.'&client='.env('CLIENT'));
        $contents = json_decode($response->getBody());

        return view('employees.qrview', compact('contents'));
    }
}
