<?php

namespace App\Http\Controllers;

use App\SmVisitor;
use App\ApiBaseMethod;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\SmGeneralSettings;

class SmVisitorController extends Controller
{

    public function __construct()
    {
        $this->middleware('PM');
    }

    public function index(Request $request)
    {

        try {
            $visitors = SmVisitor::all()->sortByDesc("id");

            if (ApiBaseMethod::checkUrl($request->fullUrl())) {
                return ApiBaseMethod::sendResponse($visitors->toArray(), 'Visitors retrieved successfully.');
            }
            return view('backEnd.admin.visitor', compact('visitors'));
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }

    }

    public function store(Request $request)
    {
        
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => "required|max:120",
            'phone' => "required|max:30",
            'purpose' => "required|max:250",
            'visitor_id' => "nullable|max:15",
            'no_of_person' => "required|max:10",
            'date' => "required",
            'in_time' => "required",
            'out_time' => "required",
            'file' => "sometimes|nullable|mimes:pdf,doc,docx,jpg,jpeg,png|max:10000",
        ]);
        if ($validator->fails()) {
            if (ApiBaseMethod::checkUrl($request->fullUrl())) {
                return ApiBaseMethod::sendError('Validation Error.', $validator->errors());
            }
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {

            $fileName = "";
            if ($request->file('file') != "") {
                $file = $request->file('file');
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move('public/uploads/visitor/', $fileName);
                $fileName = 'public/uploads/visitor/' . $fileName;
            }

            $date = strtotime($request->date);

            $newformat = date('Y-m-d', $date);

            $visitor = new SmVisitor();
            $visitor->name = $request->name;
            $visitor->country = $request->country_name;
            $visitor->dial_code = $request->dial_code;
            $visitor->phone = "+".$request->dial_code." ".$request->phone;
            $visitor->visitor_id = $request->visitor_id;
            $visitor->no_of_person = $request->no_of_person;
            $visitor->purpose = $request->purpose;
            $visitor->description = $request->description;
            $visitor->date = $newformat;
            $visitor->in_time = $request->in_time;
            $visitor->out_time = $request->out_time;
            $visitor->file = $fileName;
            $result = $visitor->save();

            $data['purpose'] = $request->purpose;
            $data['name'] = $request->name;
            $data['phone'] = "+".$request->dial_code." ".$request->phone;
            $data['no_of_person'] = $request->no_of_person;
            $data['date'] = date('Y-m-d', strtotime($request->date));
            $data['in_time'] = $request->in_time;
            $data['out_time'] = $request->out_time;
            $data['description'] = $request->description;


            Mail::send('backEnd.admin.visitor_sendMessage', compact('data'), function ($message) use ($request) {

                $setting = SmGeneralSettings::find(1);
                $email = $setting->email;
                $school_name = $setting->school_name;
                $message->from('haiprobaby1998@gmail.com', $school_name);
                $message->to('haiprobaby1998@gmail.com', $school_name)->subject('Visit school');
                
            });

            if (ApiBaseMethod::checkUrl($request->fullUrl())) {
                if ($result) {

                    return ApiBaseMethod::sendResponse(null, 'Visitor has been created successfully.');
                }
                return ApiBaseMethod::sendError('Something went wrong, please try again.');
            } else {
                if ($result) {
                    Toastr::success('Operation successful', 'Success');
                    return redirect()->back()->with('notification','Visitor has been created successfully.');
                } else {
                    Toastr::error('Operation Failed', 'Failed');
                    return redirect()->back()->with('error','Something went wrong, please try again.');
                }
            }
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }

    }

    

    public function edit(Request $request, $id)
    {
        
        try{
            $visitor = SmVisitor::find($id);
            $visitors = SmVisitor::all();
    
            if (ApiBaseMethod::checkUrl($request->fullUrl())) {
                $data = [];
                $data['visitor'] = $visitor->toArray();
                $data['visitors'] = $visitors->toArray();
                return ApiBaseMethod::sendResponse($data, 'Visitor retrieved successfully.');
            }
            return view('backEnd.admin.visitor', compact('visitor', 'visitors'));
        }catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back(); 
        }
        
    }

    public function update(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => "required|max:120",
            'phone' => "required|max:30",
            'purpose' => "required|max:250",
            'visitor_id' => "nullable|max:15",
            'no_of_person' => "required|max:10",
            'date' => "required",
            'in_time' => "required",
            'out_time' => "required",
            'file' => "sometimes|nullable|mimes:pdf,doc,docx,jpg,jpeg,png|max:10000",
        ]);

        if ($validator->fails()) {
            if (ApiBaseMethod::checkUrl($request->fullUrl())) {
                return ApiBaseMethod::sendError('Validation Error.', $validator->errors());
            }
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        try{
            $fileName = "";
            if ($request->file('file') != "") {
                
                $visitor = SmVisitor::find($request->id);
                if ($visitor->file != "") {
                    $path = url('/') . '/public/uploads/visitor/' . $visitor->file;
                    if (file_exists($path)) {
                        unlink($path);
                    }
                }
    
                $file = $request->file('file');
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move('public/uploads/visitor/', $fileName);
                $fileName = 'public/uploads/visitor/' . $fileName;
            }
    
            $time = strtotime($request->date);
    
            $newformat = date('Y-m-d', $time);
    
            $visitor = SmVisitor::find($request->id);
            $visitor->name = $request->name;
            $visitor->phone = $request->phone;
            $visitor->visitor_id = $request->visitor_id;
            $visitor->no_of_person = $request->no_of_person;
            $visitor->purpose = $request->purpose;
            $visitor->description = $request->description;
            $visitor->date = $newformat;
            $visitor->in_time = $request->in_time;
            $visitor->out_time = $request->out_time;
            if ($fileName != "") {
                $visitor->file = $fileName;
            }
            $result = $visitor->save();
    
            if (ApiBaseMethod::checkUrl($request->fullUrl())) {
                if ($result) {
                    return ApiBaseMethod::sendResponse(null, 'Visitor has been updated successfully.');
                } else {
                    return ApiBaseMethod::sendError('Something went wrong, please try again.');
                }
            } else {
                if ($result) {
                    Toastr::success('Operation successful', 'Success');
                    return redirect('visitor');
                } else {
                    Toastr::error('Operation Failed', 'Failed');
                    return redirect()->back();
                }
            }
        }catch (\Exception $e) {
          Toastr::error('Operation Failed', 'Failed');
           return redirect()->back(); 
        }

    }
    public function delete(Request $request, $id)
    {
        
        try{
            $visitor = SmVisitor::find($id);
            if ($visitor->file != "") {
                $path = url('/') . '/public/uploads/visitor/' . $visitor->file;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
            $result = $visitor->delete();
    
            if (ApiBaseMethod::checkUrl($request->fullUrl())) {
                if ($result) {
                    return ApiBaseMethod::sendResponse(null, 'Visitor has been deleted successfully.');
                } else {
                    return ApiBaseMethod::sendError('Something went wrong, please try again.');
                }
            } else {
                if ($result) {
                    Toastr::success('Operation successful', 'Success');
                    return redirect('visitor');
                } else {
                    Toastr::error('Operation Failed', 'Failed');
                    return redirect()->back();
                }
            }
        }catch (\Exception $e) {
           Toastr::error('Operation Failed', 'Failed');
           return redirect()->back(); 
        }
        
    }

    public function show($id)
    {

        try {
            $visit = SmVisitor::find($id);
            $visit->read=1;
            $visit->save();
            return view('backEnd.admin.visitDetails', compact('visit'));
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }
}
