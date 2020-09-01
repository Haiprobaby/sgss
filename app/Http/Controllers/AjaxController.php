<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SmFeesDiscount;
Use App\born_between;
Use App\born_between_year;
Use App\years;
Use \Carbon\Carbon;
Use App\late_enrolment;
Use App\withdraw;
class AjaxController extends Controller
{
    
	public function editdiscount(Request $request)
    {
    	//cập nhật lại table discount theo dữ liệu gửi lên từ ajax
    	$discount = SmFeesDiscount::find($request->id_discount);
    	$discount->name = $request->discount_for;
    	$discount->first_year = $request->first_year;
    	$discount->second_year = $request->second_year;
    	$discount->third_year = $request->third_year;
    	$discount->fourth_year = $request->fourth_year;
    	$discount->fifth_and_subsequent_years = $request->fifth_year;
    	$discount->save();


    }

    public function adddiscount(Request $request)
    {
    	
    	$discount=new SmFeesDiscount;
    	$discount->name = $request->discount_for;
    	$discount->first_year = $request->first_year;
    	$discount->second_year = $request->second_year;
    	$discount->third_year = $request->third_year;
    	$discount->fourth_year = $request->fourth_year;
    	$discount->fifth_and_subsequent_years = $request->fifth_year;
    	$discount->save();
    	
    	return ($discount->id);
    }

    public function deletediscount($id)
    {
    	$discount=SmFeesDiscount::find($id);
    	$discount->delete();
    }


    public function editlateenrol(Request $request)
    {
            $find = late_enrolment::find($request->id_late);
            
            $find->entry_date = $request->term;
            $find->percent_of_annual_tuition = $request->rate;
            $find->save();   

    }

    public function editwithdraw(Request $request)
    {
        $find=withdraw::find($request->id_withdraw);
        
    }
}
