<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function index(Request $request)
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

        $response = $client->request('GET', '/api/students?filterClassID='.$request->filterClassID.'&client='.env('CLIENT'));
        $contents = json_decode($response->getBody());

        $response2 = $client->request('GET', '/api/classes?client='.env('CLIENT'));
        $contents2 = json_decode($response2->getBody());

        $response3 = $client->request('GET', '/api/batches?client='.env('CLIENT'));
        $contents3 = json_decode($response3->getBody());
        // var_dump($contents);
        return view('students.index')
                ->with('students', $contents)
                ->with('classes', $contents2)
                ->with('batches', $contents3);
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
            // 'studQR'=>'required',
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
            // "base_uri" => "https://idserver.kbtc.edu.mm",
            // "base_uri" => "https://5168e273-83f6-4efb-9f88-bad88cb7669e.mock.pstmn.io",
            "base_uri" => env('BASE_URI'),
            "headers" => $headers
        ]);
        $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
        $studKey = substr(str_shuffle($data), 0, 30);

        $t = time();

        $response = $client->request('POST', "/api/students?studCardID=".$fields['studCardID']."&studName=".$fields['studName']."&studClassID=".$fields['studClassID']."&studBatchID=".$fields['studBatchID']."&studGuardName=".$fields['studGuardName']."&studDoB=".$fields['studDoB']."&studEmgcPhone1=".$fields['studEmgcPhone1']."&studEmgcPhone2=".$fields['studEmgcPhone2']."&SchoolEmgcCall=".$fields['SchoolEmgcCall']."&studKey=".$studKey."&studStatus=1&client=".env('CLIENT')."&studQR=".$fields['studCardID'].'_'.$t.'.png&studProfileImg=None');
        
        $contents = json_decode($response->getBody());

        return redirect('/dashboard/students?filterClassID=*');
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
            // "base_uri" => "https://idserver.kbtc.edu.mm",
            // "base_uri" => "http://127.0.0.1:8000",
            "base_uri" => env('BASE_URI'),
            "headers" => $headers
        ]);
        
        $response = $client->request('GET', "/api/students/".$id.'?client='.env('CLIENT'));
        $contents = json_decode($response->getBody());

        $response2 = $client->request('GET', "/api/classes?client=".env('CLIENT'));
        $contents2 = json_decode($response2->getBody());

        $response3 = $client->request('GET', "/api/batches?client=".env('CLIENT'));
        $contents3 = json_decode($response3->getBody());

        // return redirect('/dashboard/students/$id');
        return view('students.details')
                ->with('student', $contents)
                ->with('classes', $contents2)
                ->with('batches', $contents3);
    }

    public function update(Request $request, $id)
    {
        $fields = $request->validate([
            'studName'=>'required',
            'studClassID'=>'required',
            'studBatchID'=>'required',
            'studGuardName'=>'required',    
            'studDoB'=>'required',
            'studEmgcPhone1'=>'required',
            'studEmgcPhone2'=>'required',
            'SchoolEmgcCall'=>'required',
        ]);

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

        $response = $client->request('PATCH', "/api/students/".$id."?studName=".$fields['studName']."&studClassID=".$fields['studClassID']."&studBatchID=".$fields['studBatchID']."&studGuardName=".$fields['studGuardName']."&studDoB=".$fields['studDoB']."&studEmgcPhone1=".$fields['studEmgcPhone1']."&studEmgcPhone2=".$fields['studEmgcPhone2']."&SchoolEmgcCall=".$fields['SchoolEmgcCall']."&client=".env('CLIENT'));

        $contents = json_decode($response->getBody());
        return redirect(route('students.show', $id));

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

        $response = $client->request('DELETE', '/api/students/'.$id.'?client='.env('CLIENT'));
        $contents = json_decode($response->getBody());
        
        return redirect('/dashboard/students?filterClassID=*');
    }

    public function qrshow($studCardID, Request $request)
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
        
        $response = $client->request('GET', "/api/students/search/".$studCardID."?studKey=".$request->studKey.'&client='.env('CLIENT'));
        $contents = json_decode($response->getBody());

        $response2 = $client->request('GET', "/api/classes/search/".$contents[0]->studClassID.'?client='.env('CLIENT'));
        $contents2 = json_decode($response2->getBody());

        $response3 = $client->request('GET', "/api/batches/search/".$contents[0]->studBatchID.'?client='.env('CLIENT'));
        $contents3 = json_decode($response3->getBody());

        return view('students.qrview')
                ->with('students', $contents)
                ->with('class', $contents2)
                ->with('batch', $contents3);
    }
}
