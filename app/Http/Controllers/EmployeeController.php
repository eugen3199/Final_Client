<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $headers = [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.Session::get('key'),
        ];

        $client = new Client([
            // "base_uri" => "https://idserver.kbtc.edu.mm",
            // "base_uri" => "https://465bbac7-de50-4a9e-b710-e33d4cf718d1.mock.pstmn.io",
            "base_uri" => env('BASE_URI'),
            "headers" => $headers
        ]);

        if(isset($request->search_value)){
            $response = $client->request('GET', '/api/employees/query?client='.env('CLIENT').'&page='.$request->page.'&search_value='.$request->search_value);
        }
        else{
            $response = $client->request('GET', '/api/employees?client='.env('CLIENT').'&page='.$request->page);
        }

        $contents = json_decode($response->getBody());

        $response2 = $client->request('GET', '/api/campuses?client='.env('CLIENT'));
        $contents2 = json_decode($response2->getBody());

        $response3 = $client->request('GET', '/api/departments?client='.env('CLIENT'));
        $contents3 = json_decode($response3->getBody());

        $response4 = $client->request('GET', '/api/positions?client='.env('CLIENT'));
        $contents4 = json_decode($response4->getBody());

        return view('employees.index')
                ->with('employees', $contents)
                ->with('page', $request->page)
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

        $response2 = $client->request('GET', "/api/campuses/search/".$contents[0]->empCampusID.'?client='.env('CLIENT'));
        $contents2 = json_decode($response2->getBody());

        $response3 = $client->request('GET', "/api/positions/search/".$contents[0]->empPosID.'?client='.env('CLIENT'));
        $contents3 = json_decode($response3->getBody());

        $response4 = $client->request('GET', "/api/departments/search/".$contents[0]->empDeptID.'?client='.env('CLIENT'));
        $contents4 = json_decode($response4->getBody());

        return view('employees.qrview')
                ->with('employee', $contents[0])
                ->with('campus', $contents2)
                ->with('position', $contents3)
                ->with('department', $contents4);

        return view('employees.qrview', compact('contents'));
    }

    public function destroy($id)
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

        $response = $client->request('DELETE', '/api/employees/'.$id.'?client='.env('CLIENT'));
        $contents = json_decode($response->getBody());
        return redirect(route('employees.index'));
    }

    // public function query(Request $request)
    // {
    //     $search_value = $request->search_value;

    //     $headers = [
    //         'Accept' => 'application/json',
    //         'Authorization' => 'Bearer '.Session::get('key'),
    //     ];

    //     $client = new Client([
    //         // "base_uri" => "https://idserver.kbtc.edu.mm",
    //         "base_uri" => "https://465bbac7-de50-4a9e-b710-e33d4cf718d1.mock.pstmn.io",
    //         // "base_uri" => env('BASE_URI'),
    //         "headers" => $headers
    //     ]);

    //     $response = $client->request('GET', '/api/employees/query?client='.env('CLIENT').'&search_value='.$search_value);

    //     return view('employees.query',['blogs' => $blogs]);
    // }

    public function import(Request $request)
    {
        // check file is present and has no problem uploading it
        // if ($request->hasFile('image') && $request->file('photo')->isValid()) {
        //     // get Illuminate\Http\UploadedFile instance
        //     $image = $request->file('image');

        //     // post request with attachment
        //     Http::attach('attachment', file_get_contents($image), 'image.jpg')
        //         ->post('example.com/v1/blog/store', $request->all());
        // } else {
        //     Http::post('http://example.com/v1/blog/store', $request->all());
        // }

        // $fname = $request->file->get();

        // // $message = $fname;
        // Log::debug($fname);
        // echo"<script>console.log('".$fname."')</script>";

        $headers = [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.Session::get('key'),
        ];

        $client = new Client([
            // "base_uri" => "https://idserver.kbtc.edu.mm",
            // "base_uri" => "https://d8335347-028e-43ce-9434-d1ffc2fe44d2.mock.pstmn.io",
            "base_uri" => env('BASE_URI'),
            "headers" => $headers
        ]);

        $res = $client->request('POST', '/api/employees/import', [
            'multipart' => [
                [
                    'name'     => 'file',
                    'contents' => file_get_contents($request->file->getRealPath()),
                    'filename' => $request->file->getClientOriginalName()
                ],
                [
                    'name' => 'client',
                    'contents' => env('CLIENT')
                ]
            ]
        ]);
        // return $res;
        return redirect(route('employees.index'));
    //     if(isset($request->search_value)){
    //         $response = $client->request('GET', '/api/employees/query?client='.env('CLIENT').'&page='.$request->page.'&search_value='.$request->search_value);
    //     }
    //     // else{
    //     //     $response = $client->request('GET', '/api/employees/preview?client='.env('CLIENT').'&page='.$request->page);
    //     // }

    //     $contents = json_decode($response->getBody());

    //     $response2 = $client->request('GET', '/api/campuses?client='.env('CLIENT'));
    //     $contents2 = json_decode($response2->getBody());

    //     $response3 = $client->request('GET', '/api/departments?client='.env('CLIENT'));
    //     $contents3 = json_decode($response3->getBody());

    //     $response4 = $client->request('GET', '/api/positions?client='.env('CLIENT'));
    //     $contents4 = json_decode($response4->getBody());

    //     return view('employees.preview')
    //             ->with('employees', $contents)
    //             ->with('page', $request->page)
    //             ->with('campuses', $contents2)
    //             ->with('depts', $contents3)
    //             ->with('poss', $contents4);
    }
}