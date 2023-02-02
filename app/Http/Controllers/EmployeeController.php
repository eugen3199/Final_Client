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
        // var_dump($contents);
        return view('employees', compact('contents'));
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
            'empImage' => 'required'
        ]);

        // Store Image
        $imageName = 'temp.'.$request->empImage->extension();

        // Public Folder
        $request->empImage->move(public_path('/tmp'), $imageName);

        // // var_dump($fields);

        $headers = [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.Session::get('key'),
        ];

        $client = new Client([
            // "base_uri" => "https://idserver.kbtc.edu.mm",
            "base_uri" => "https://cdae9772-5646-4692-9a84-a96ed727de20.mock.pstmn.io",
            "headers" => $headers
        ]);
        
        // $response = $client->request('POST', "/api/employees?empCardID=".$fields['empCardID']."&empName=".$fields['empName']."&empPosID=".$fields['empPosID']."&empDeptID=".$fields['empDeptID']."&empJoinDate=".$fields['empJoinDate']."&empNRC=".$fields['empNRC']."&empPhone=".$fields['empPhone']."&empEmgcPerson=".$fields['empEmgcPerson']."&empEmgcPhone=".$fields['empEmgcPhone']."&empCampusID=".$fields['empCampusID']."&empStatus=1&empImage=".$fields['empImage']
        // ['body' => $request->empImage]
        // );
        // $response = $client->request('POST', "/api/employees", [
        //     'form_params' => [
        //         'empName'=>$fields['empName'],
        //         'empCardID'=>$fields['empCardID'],
        //         'empPosID'=>$fields['empName'],
        //         'empDeptID'=>$fields['empPosID'],
        //         'empJoinDate'=>$fields['empDeptID'],
        //         'empNRC'=>$fields['empNRC'],
        //         'empPhone'=>$fields['empPhone'],
        //         'empEmgcPerson'=>$fields['empEmgcPerson'],
        //         'empEmgcPhone'=>$fields['empEmgcPhone'],
        //         'empCampusID'=>$fields['empCampusID'],
        //     ],
        //     'body' => [
        //         'empImage' => $fields['empImage'],
        //     ],
        //     'multipart' => [
        //         [
        //             'name'     => 'empImage',
        //             'contents' => file_get_contents(public_path('/tmp').$imageName),
        //             'filename' => $imageName
        //         ],
        //     ],
        // ]);
        // $contents = json_decode($response->getBody());
        
        // return redirect('/dashboard/employees');

        Try {
            $response = $client->post(
                '/api/employees', [
                    'multipart' => [
                        [
                            'name'     => 'empImage',
                            'contents' => file_get_contents($media->getPath()),
                        ],
                        [
                            'empName'=>$fields['empName'],
                            'empCardID'=>$fields['empCardID'],
                            'empPosID'=>$fields['empName'],
                            'empDeptID'=>$fields['empPosID'],
                            'empJoinDate'=>$fields['empDeptID'],
                            'empNRC'=>$fields['empNRC'],
                            'empPhone'=>$fields['empPhone'],
                            'empEmgcPerson'=>$fields['empEmgcPerson'],
                            'empEmgcPhone'=>$fields['empEmgcPhone'],
                            'empCampusID'=>$fields['empCampusID'],
                        ],
                    ],
                ],
            );
            $contents = json_decode($response->getBody());
        } catch(\Exception $e) {
            echo $e->getMessage();
            $response = $e->getResponse();
            $responseBody = $response->getBody()->getContents();

            echo $responseBody;
            exit;
        }
        return redirect('/dashboard/employees');
    }

    public function show($id)
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
            "headers" => $headers
        ]);
        
        $response = $client->request('GET', "/api/employees/".$id);
        $contents = json_decode($response->getBody());
        // return redirect('/dashboard/employees/$id');
        return view('empDetails', compact('contents'));
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

    public function qrshow($empCardID)
    {
        $headers = [
            'Accept' => 'application/json',
        ];

        $client = new Client([
            "base_uri" => "https://idserver.kbtc.edu.mm",
            "headers" => $headers
        ]);
        
        $response = $client->request('GET', "/api/employees/search/".$empCardID);
        $contents = json_decode($response->getBody());

        return view('empqrview', compact('contents'));
    }
}
