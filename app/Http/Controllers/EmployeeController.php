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
            // "base_uri" => "https://idserver.kbtc.edu.mm",
            // "base_uri" => "https://884bac0d-a606-4d17-9372-fd2c011ff782.mock.pstmn.io",
            "base_uri" => env('BASE_URI'),
            "headers" => $headers
        ]);

        $response = $client->request('GET', '/api/employees?client='.env('CLIENT'));
        $contents = json_decode($response->getBody());

        $response2 = $client->request('GET', '/api/campuses?client='.env('CLIENT'));
        $contents2 = json_decode($response2->getBody());

        $response3 = $client->request('GET', '/api/departments?client='.env('CLIENT'));
        $contents3 = json_decode($response3->getBody());

        $response4 = $client->request('GET', '/api/positions?client='.env('CLIENT'));
        $contents4 = json_decode($response4->getBody());

        return view('employees.index')
                ->with('employees', $contents)
                ->with('campuses', $contents2)
                ->with('depts', $contents3)
                ->with('poss', $contents4);
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
            // "base_uri" => "https://idserver.kbtc.edu.mm",
            // "base_uri" => "http://127.0.0.1:8000",
            "base_uri" => env('BASE_URI'),
            "headers" => $headers
        ]);
        $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
        $empKey = substr(str_shuffle($data), 0, 30);
        // $empKey = '123asdzxcqweasd';
        // var_dump($empKey);

        //To fix Response to be more clear
        $response = $client->request('POST', "/api/employees?empCardID=".$fields['empCardID']."&empName=".$fields['empName']."&empPosID=".$fields['empPosID']."&empDeptID=".$fields['empDeptID']."&empJoinDate=".$fields['empJoinDate']."&empNRC=".$fields['empNRC']."&empPhone=".$fields['empPhone']."&empEmgcPerson=".$fields['empEmgcPerson']."&empEmgcPhone=".$fields['empEmgcPhone']."&empCampusID=".$fields['empCampusID']."&empStatus=1&empKey=".$empKey.'&client='.env('CLIENT')."&empQR=".$fields['empCardID'].'_'.time().'.png&empProfileImg=None');
        
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
            // "base_uri" => "https://idserver.kbtc.edu.mm",
            // "base_uri" => "http://127.0.0.1:8000",
            "base_uri" => env('BASE_URI'),
            "headers" => $headers
        ]);
        
        $response = $client->request('GET', "/api/employees/".$id.'?client='.env('CLIENT'));
        $contents = json_decode($response->getBody());

        $response2 = $client->request('GET', '/api/campuses?client='.env('CLIENT'));
        $contents2 = json_decode($response2->getBody());

        $response3 = $client->request('GET', '/api/departments?client='.env('CLIENT'));
        $contents3 = json_decode($response3->getBody());

        $response4 = $client->request('GET', '/api/positions?client='.env('CLIENT'));
        $contents4 = json_decode($response4->getBody());
        // return redirect('/dashboard/employees/$id');
        return view('employees.details')
                ->with('employees', $contents)
                ->with('campuses', $contents2)
                ->with('depts', $contents3)
                ->with('poss', $contents4);
    }

    public function update(Request $request, $id)
    {
        $fields = $request->validate([
            'empName'=>'required',
            'empPosID'=>'required',
            'empDeptID'=>'required',
            'empJoinDate'=>'required',
            'empNRC'=>'required',
            'empPhone'=>'required',
            'empEmgcPerson'=>'required',
            'empEmgcPhone'=>'required',
            'empCampusID'=>'required',
        ]);

        $headers = [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.Session::get('key'),
        ];

        $client = new Client([
            // "base_uri" => "https://idserver.kbtc.edu.mm",
            // "base_uri" => "https://884bac0d-a606-4d17-9372-fd2c011ff782.mock.pstmn.io",
            "base_uri" => env('BASE_URI'),

            "headers" => $headers
        ]);

        $response = $client->request('PATCH', "/api/employees/".$id."?empName=".$fields['empName']."&empPosID=".$fields['empPosID']."&empDeptID=".$fields['empDeptID']."&empJoinDate=".$fields['empJoinDate']."&empNRC=".$fields['empNRC']."&empPhone=".$fields['empPhone']."&empEmgcPerson=".$fields['empEmgcPerson']."&empEmgcPhone=".$fields['empEmgcPhone']."&empCampusID=".$fields['empCampusID'].'&client='.env('CLIENT'));

        $contents = json_decode($response->getBody());
        return redirect(route('employees.show', $id));

    }

    public function qrshow($empCardID, Request $request)
    {
        $headers = [
            'Accept' => 'application/json',
        ];

        $client = new Client([
            // "base_uri" => "https://idserver.kbtc.edu.mm",
            // "base_uri" => "http://127.0.0.1:8000",
            "base_uri" => env('BASE_URI'),
            "headers" => $headers
        ]);
        
        $response = $client->request('GET', "/api/employees/search/".$empCardID."?empKey=".$request->empKey.'&client='.env('CLIENT'));
        $contents = json_decode($response->getBody());

        return view('employees.qrview', compact('contents'));
    }
}
