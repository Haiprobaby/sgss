<?php

namespace App\Http\Controllers;

use App\SmAddIncome;
use App\ApiBaseMethod;
use App\SmBankAccount;
use App\SmChartOfAccount;
use App\SmPaymentMethhod;
use App\YearCheck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
Use App\SmStudent;
Use App\SmParent;

class SmAddIncomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('PM');
        // User::checkAuth();
    }


    public function index(Request $request)
    {
        try {
            $add_incomes = SmAddIncome::where('active_status', '=', 1)->where('school_id', Auth::user()->school_id)->get();
            $income_heads = SmChartOfAccount::where('type', "I")->where('active_status', '=', 1)->where('school_id', Auth::user()->school_id)->get();
            $bank_accounts = SmBankAccount::where('active_status', '=', 1)->where('school_id', Auth::user()->school_id)->get();
            $payment_methods = SmPaymentMethhod::where('active_status', '=', 1)->where('school_id', Auth::user()->school_id)->get();
            $student_list = SmStudent::where('active_status',1)->get();

            if (ApiBaseMethod::checkUrl($request->fullUrl())) {
                $data = [];
                $data['add_incomes'] = $add_incomes->toArray();
                $data['income_heads'] = $income_heads->toArray();
                $data['bank_accounts'] = $bank_accounts->toArray();
                $data['payment_methods'] = $payment_methods->toArray();
                $data['student_list']=$student_list->toArray();

                return ApiBaseMethod::sendResponse($data, null);
            }

            return view('backEnd.accounts.add_income', compact('add_incomes', 'income_heads', 'bank_accounts', 'payment_methods','student_list'));
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }
    public function store(Request $request)
    {
        $input = $request->all();
        if ($request->payment_method == "3") {
            $validator = Validator::make($input, [
                'income_head' => "required|integer",
                'student_id'=>"required",
                'name' => "required",
                'date' => "required",
                'accounts' => "required|integer",
                'payment_method' => "required|integer",
                'amount' => "required|integer",
                'file' => "sometimes|nullable|mimes:pdf,doc,docx,jpg,jpeg,png|max:10000",
                'amount_in_words'=>"required",
                'address'=>"required",
                'receivingfor'=>"required",
                'payer'=>"required",
                'payer_name'=>'required',
            ]);
        } else {
            $validator = Validator::make($input, [
                'income_head' => "required|integer",
                'student_id'=>'required',
                'name' => "required",
                'date' => "required",
                'payment_method' => "required|integer",
                'amount' => "required|integer",
                'file' => "sometimes|nullable|mimes:pdf,doc,docx,jpg,jpeg,png|max:10000",
                'amount_in_words'=>"required",
                'address'=>"required",
                'receivingfor'=>"required",
                'payer'=>"required",
                'payer_name'=>'required',
            ]);
        }

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
                $file->move('public/uploads/add_income/', $fileName);
                $fileName =  'public/uploads/add_income/' . $fileName;
            }

            $date = strtotime($request->date);

            $newformat = date('Y-m-d', $date);

            DB::statement('SET FOREIGN_KEY_CHECKS=0;');


            $add_income = new SmAddIncome();
            $add_income->name = $request->name;
            $add_income->student_id = $request->student_id;
            $add_income->payer = $request->payer;
            $add_income->payer_name=$request->payer_name;
            $add_income->income_head_id = $request->income_head;
            $add_income->date = $newformat;
            $add_income->payment_method_id = $request->payment_method;
            if ($request->payment_method == "3") {
                $add_income->account_id = $request->accounts;
            }

            $add_income->amount = $request->amount;
            $add_income->file = $fileName;
            $add_income->description = $request->description;
            $add_income->address = $request->address;
            $add_income->receiving_for=$request->receivingfor;
            $add_income->amount_in_words=$request->amount_in_words;
            $add_income->school_id = Auth::user()->school_id;
            $add_income->academic_id = YearCheck::getAcademicId();
            $result = $add_income->save();

            if (ApiBaseMethod::checkUrl($request->fullUrl())) {
                if ($result) {
                    return ApiBaseMethod::sendResponse(null, 'Income has been created successfully');
                } else {
                    return ApiBaseMethod::sendError('Something went wrong, please try again.');
                }
            } else {
                if ($result) {
                    Toastr::success('Operation successful', 'Success');
                    return redirect()->back();
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

    public function edit(Request $request, $id)
    {

        try {
            $add_income = SmAddIncome::find($id);
            $add_incomes = SmAddIncome::where('active_status', 1)->where('school_id', Auth::user()->school_id)->get();
            $income_heads = SmChartOfAccount::where('active_status', '=', 1)->where('school_id', Auth::user()->school_id)->get();
            $bank_accounts = SmBankAccount::where('active_status', '=', 1)->where('school_id', Auth::user()->school_id)->get();
            $payment_methods = SmPaymentMethhod::where('active_status', '=', 1)->where('school_id', Auth::user()->school_id)->get();
            $student_list = SmStudent::where('active_status', '=', 1)->where('school_id',Auth::user()->school_id)->get();

            if (ApiBaseMethod::checkUrl($request->fullUrl())) {
                $data = [];
                $data['add_income'] = $add_income->toArray();
                $data['add_incomes'] = $add_incomes->toArray();
                $data['income_heads'] = $income_heads->toArray();
                $data['bank_accounts'] = $bank_accounts->toArray();
                $data['payment_methods'] = $payment_methods->toArray();
                return ApiBaseMethod::sendResponse($data, null);
            }
            return view('backEnd.accounts.add_income', compact('add_income', 'add_incomes', 'income_heads', 'bank_accounts', 'payment_methods'));
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }


    public function update(Request $request)
    {
        $input = $request->all();
        if ($request->payment_method == "3") {
            $validator = Validator::make($input, [
                'income_head' => "required",
                'student_id' => "required",
                'name' => "required",
                'date' => "required",
                'accounts' => "required",
                'payment_method' => "required",
                'amount' => "required",
                'file' => "sometimes|nullable|mimes:pdf,doc,docx,jpg,jpeg,png|max:10000",
                'amount_in_words'=>"required",
                'address'=>"required",
                'receivingfor'=>"required",
                'payer' => "required",
                'payer_name'=>'required',
            ]);
        } else {
            $validator = Validator::make($input, [
                'income_head' => "required",
                'student_id' => "required",
                'name' => "required",
                'date' => "required",
                'payment_method' => "required",
                'amount' => "required",
                'file' => "sometimes|nullable|mimes:pdf,doc,docx,jpg,jpeg,png|max:10000",
                'amount_in_words'=>"required",
                'address'=>"required",
                'receivingfor'=>"required",
                'payer' => "required",
                'payer_name'=>'required',
            ]);
        }

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

                $add_income = SmAddIncome::find($request->id);
                if ($add_income->file != "") {
                    unlink($add_income->file);
                }

                $file = $request->file('file');
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move('public/uploads/add_income/', $fileName);
                $fileName =  'public/uploads/add_income/' . $fileName;
            }

            $date = strtotime($request->date);

            $newformat = date('Y-m-d', $date);

            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

            $add_income = SmAddIncome::find($request->id);
            $add_income->student_id = $request->student_id;
            $add_income->payer = $request->payer;
            $add_income->payer_name = $request->payer_name;
            $add_income->name = $request->name;
            $add_income->income_head_id = $request->income_head;
            $add_income->date = $newformat;
            $add_income->payment_method_id = $request->payment_method;
            if ($request->payment_method == "3") {
                $add_income->account_id = $request->accounts;
            }
            $add_income->amount = $request->amount;
            if ($request->file('file') != "") {
                $add_income->file = $fileName;
            }
            $add_income->description = $request->description;
            $add_income->address=$request->address;
            $add_income->receiving_for=$request->receivingfor;
            $add_income->amount_in_words=$request->amount_in_words;
            $add_income->school_id = Auth::user()->school_id;
            $add_income->academic_id = YearCheck::getAcademicId();
            $result = $add_income->save();

            if (ApiBaseMethod::checkUrl($request->fullUrl())) {
                if ($result) {
                    return ApiBaseMethod::sendResponse(null, 'Income has been updated successfully');
                } else {
                    return ApiBaseMethod::sendError('Something went wrong, please try again.');
                }
            } else {
                if ($result) {
                    Toastr::success('Operation successful', 'Success');
                    return redirect()->back();
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
    public function delete(Request $request)
    {

        try {
            $add_income = SmAddIncome::find($request->id);
            if ($add_income->file != "") {
                unlink($add_income->file);
            }
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            $result = $add_income->delete();

            if (ApiBaseMethod::checkUrl($request->fullUrl())) {
                if ($result) {
                    return ApiBaseMethod::sendResponse(null, 'Income has been deleted successfully');
                } else {
                    return ApiBaseMethod::sendError('Something went wrong, please try again.');
                }
            } else {
                if ($result) {
                    Toastr::success('Operation successful', 'Success');
                    return redirect()->back();
                } else {
                    Toastr::error('Operation Failed', 'Failed');
                    return redirect()->back();
                }
            }
        } catch (\Exception $e) {
            // return $e;
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }
    public function show($id)
    {

        try {
            $income = SmAddIncome::find($id);
            return view('backEnd.accounts.incomeDetails', compact('income'));
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function printIncome($id)
    {

        try {
            $income = SmAddIncome::find($id);
            $student_name = SmStudent::find($income->student_id)->full_name;

            
            return view('backEnd.accounts.printIncome', compact('income','student_name'));
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }
    public function studentInfo($id){
        try{
            $parent_id=SmStudent::find($id)->parent_id;
            $parent_info=SmParent::find($id);
            return $parent_info;
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }
    public function payerName($id_student,$id_pay){
        try {
           $parent_id = SmStudent::find($id_student)->parent_id;
           if ($id_pay=="1") {
               $payer_name = SmParent::find($parent_id)->fathers_name;
           }
           elseif ($id_pay=="2") {
               $payer_name = SmParent::find($parent_id)->mothers_name;
           }
           elseif ($id_pay=="3") {
               $payer_name = SmParent::find($parent_id)->guardians_name;
           }
           elseif($id_pay=="4"){
               $payer_name="";
           }
           return $payer_name;
       } catch (\Exception $e) {
           Toastr::error('Operation Failed', 'Failed');
           return redirect()->back();
       }
   }
}
