<?php

namespace App\Http\Controllers;

use App\SmBaseSetup;
use App\SmComplaint;
use App\SmSetupAdmin;
use App\ApiBaseMethod;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\SmGeneralSettings;

class SmComplaintController extends Controller
{

    public function __construct()
    {
        $this->middleware('PM');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        try {
            $complaints = SmComplaint::where('active_status', 1)->orderBy('id','desc')->get();
            $complaint_types = SmSetupAdmin::where('type', 2)->get();
            $complaint_sources = SmSetupAdmin::where('type', 3)->get();

            if (ApiBaseMethod::checkUrl($request->fullUrl())) {
                $data = [];
                $data['complaints'] = $complaints->toArray();
                $data['complaint_types'] = $complaint_types->toArray();
                $data['complaint_sources'] = $complaint_sources->toArray();
                return ApiBaseMethod::sendResponse($data, 'Complaints retrieved successfully.');
            }
            return view('backEnd.admin.complaint', compact('complaints', 'complaint_types', 'complaint_sources'));
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $input = $request->all();
        $validator = Validator::make($input, [
            'complaint_by' => "required|max:250",
            'complaint_type' => "required",
            'email' => "required",
            'date' => "required",
            'phone' => "required|max:30",
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
                $file->move('public/uploads/complaint/', $fileName);
                $fileName =  'public/uploads/complaint/' . $fileName;
            }

            $complaint = new SmComplaint();
            $complaint->complaint_by = $request->complaint_by;
            $complaint->complaint_type = $request->complaint_type;
            $complaint->email = $request->email;
            $complaint->country = $request->country_name;
            $complaint->dial_code = $request->dial_code;
            $complaint->phone ="+".$request->dial_code." ".$request->phone;
            $complaint->date = date('Y-m-d', strtotime($request->date));
            $complaint->description = $request->description;            
            $complaint->file = $fileName;           
            $result = $complaint->save();

            $data['name'] = $request->complaint_by;
            $data['type'] = $request->complaint_type;
            $data['email'] = $request->email;
            $data['phone'] = "+".$request->dial_code." ".$request->phone;
            $data['date'] = date('Y-m-d', strtotime($request->date));
            $data['description'] = $request->description;


            Mail::send('backEnd.admin.complaint_sendMessage', compact('data'), function ($message) use ($request) {

                $setting = SmGeneralSettings::find(1);
                $email = $setting->email;
                $school_name = $setting->school_name;
                $message->from($email, $school_name);
                $message->to($email, $school_name)->subject('complaint');
                
            });


            if (ApiBaseMethod::checkUrl($request->fullUrl())) {
                if ($result) {
                    return ApiBaseMethod::sendResponse('null', 'Complaint has been created successfully.');
                } else {
                    return ApiBaseMethod::sendError('Something went wrong, please try again.');
                }
            } else {
                if ($result) {
                    Toastr::success('Operation successful', 'Success');
                    return redirect()->back()->with('notification','Complaint has been created successfully.');
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


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        try {
            $complaint = SmComplaint::find($id);
            $complaint->read=1;
            $complaint->save();
            return view('backEnd.admin.complaintDetails', compact('complaint'));
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        try {
            $complaints = SmComplaint::where('active_status', 1)->get();
            $complaint = SmComplaint::find($id);

            $complaint_types = SmSetupAdmin::where('type', 2)->get();
            $complaint_sources = SmSetupAdmin::where('type', 3)->get();
            
            if (ApiBaseMethod::checkUrl($request->fullUrl())) {
                $data = [];
                $data['complaints'] = $complaints->toArray();
                $data['complaint'] = $complaint->toArray();
                $data['complaint_types'] = $complaint_types->toArray();
                $data['complaint_sources'] = $complaint_sources->toArray();

                return ApiBaseMethod::sendResponse($data, 'complaint retrieved successfully.');
            }

            return view('backEnd.admin.complaint', compact('complaint', 'complaints', 'complaint_types', 'complaint_sources'));
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'complaint_by' => "required|max:250",
            'complaint_type' => "required",
            'complaint_source' => "required",
            'phone' => "required|max:30",
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
                $complaint = SmComplaint::find($request->id);
                if ($complaint->file != "") {
                    if (file_exists($complaint->file)) {
                        unlink($complaint->file);
                    }
                }
                $file = $request->file('file');
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move('public/uploads/complaint/', $fileName);
                $fileName =  'public/uploads/complaint/' . $fileName;
            }


            $complaint = SmComplaint::find($request->id);
            $complaint->complaint_by = $request->complaint_by;
            $complaint->complaint_type = $request->complaint_type;
            $complaint->complaint_source = $request->complaint_source;
            $complaint->phone = $request->phone;
            $complaint->date = date('Y-m-d', strtotime($request->date));
            $complaint->description = $request->description;
            $complaint->action_taken = $request->action_taken;
            $complaint->assigned = $request->assigned;
            if ($fileName != "") {
                $complaint->file = $fileName;
            }
            $result = $complaint->save();


            if (ApiBaseMethod::checkUrl($request->fullUrl())) {
                if ($result) {
                    return ApiBaseMethod::sendResponse(null, 'Complaint has been updated successfully.');
                } else {
                    return ApiBaseMethod::sendError('Something went wrong, please try again.');
                }
            } else {
                if ($result) {
                    Toastr::success('Operation successful', 'Success');

                    return redirect('complaint');
                } else {
                    Toastr::error('Operation Failed', 'Failed');
                    return redirect()->back();
                }
            }
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        try {
            $complaint = SmComplaint::find($id);
            if ($complaint->file != "") {
                if (file_exists($complaint->file)) {
                    unlink($complaint->file);
                }
            }
            $result = $complaint->delete();

            if (ApiBaseMethod::checkUrl($request->fullUrl())) {
                if ($result) {
                    return ApiBaseMethod::sendResponse(null, 'Complaint has been deleted successfully.');
                } else {
                    return ApiBaseMethod::sendError('Something went wrong, please try again.');
                }
            } else {
                if ($result) {
                    Toastr::success('Operation successful', 'Success');
                    return redirect('complaint');
                } else {
                    Toastr::error('Operation Failed', 'Failed');
                    return redirect()->back();
                }
            }
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }
}
