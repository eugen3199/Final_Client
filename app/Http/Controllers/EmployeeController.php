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
            "headers" => $headers
        ]);

        $response = $client->request('GET', '/api/employees');
        $contents = json_decode($response->getBody());
        var_dump($contents);
        return view('employees', $contents);
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'empCardID' => 'required|string',
            'empName' => 'required|string',
            'empNRC' => 'required|string',
            'empDeptID' => 'required|string',
            'empPosID' => 'required|string',
            'empJoinDate' => 'required|string',
            'empCampusID' => 'required|string',
            'empEmgcPhone' => 'required|string'
        ]);

        $headers = [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.Session::get('key'),
        ];

        $client = new Client([
            "base_uri" => "https://idserver.kbtc.edu.mm",
            "headers" => $headers
        ]);
        $response = $client->request('POST', "/api/employees?empCardID=".$fields['empCardID']."&empName=".$fields['empName']."&empPosID=".$fields['empPosID']."&empDeptID=".$fields['empDeptID']."&empJoinDate=".$fields['empJoinDate']."&empNRC=".$fields['empJoinDate']."&empPhone=".$fields['empPhone']."&empEmgcPerson=".$fields['empEmgcPerson']."&empEmgcPhone=".$fields['empEmgcPhone']."&empCampusID=".$fields['empCampusID']."&empStatus=1");
        $contents = json_decode($response->getBody());
        // var_dump($contents);
        return redirect('/dashboard');
    }

    public function show()
    {
        
    }
    
    public function update()
    {
        
    }
}
