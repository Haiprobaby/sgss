<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SmFeesGroup;
use App\sm_fees;
use App\SmAcademicYear;
use App\smroute;
use DB;
use App\SmFeesDiscount;
use Brian2694\Toastr\Facades\Toastr;
use App\late_enrolment;
use App\school_grades;
use App\withdraw;
Use App\born_between;
Use App\born_between_year;

Use \Carbon\Carbon;
class feesController extends Controller
{

	public function getlist()
	{
        $discount=SmFeesDiscount::where('type',null)->get();
		$groups = SmFeesGroup::all();
        $late = late_enrolment::all();       
        $withdraw=withdraw::all();

        $thisyear=Carbon::now()->year;                          //lấy năm hiện tại
        $previousSchoolYear=($thisyear-1)."-".$thisyear;        //Lấy niên khóa trước
        $thisSchoolYear=$thisyear."-".($thisyear+1);            //lấy niên khóa hiện tại
        $nextSchoolYear=($thisyear+1)."-".($thisyear+2);        //lấy niên khóa tiếp theo
               //lấy niên khóa kế sau 

        $schoolyears=[];                                        //tạo mảng schoolyears trống 
        array_push($schoolyears,$previousSchoolYear,$thisSchoolYear,$nextSchoolYear);      //đẩy các niên khóa đã lấy được vào mảng schoolyears

        $born_between=DB::table('born_between')->orderby('id','desc')->limit(14)->get();
        $grades=[]; 
        $fromto=[];
        $id=[];
        for ($i=0; $i < $born_between->count() ; $i++) { 
            $grades[$i]=born_between_year::where('id_born',$born_between[$i]->id)               
                                                    ->whereIn('school_year',$schoolyears) //gọi mảng schoolyears làm điều kiện truy vấn
                                                    ->orderby('id','asc')
                                                    ->get();
            
            


            $from=$born_between[$i]->from; //lấy ngày sinh bắt đầu ở mảng born_between thứ i
            $to=$born_between[$i]->to;      //lấy ngày sinh kết thúc ở mảng born_between  thứ i
            $fromto[$i]=$from." to ".$to ;  //nối 2 mảng lại
            $id[$i]=$born_between[$i]->id;
        }
 
        $list=array_combine($fromto,$grades);  //combine 2 mảng fromto và grade lại

        

        $i=0;  ///khai báo i =0 truyền sang view rồi tăng dần để lấy được từng id;

        //dd($list);


		return view('backEnd.feesCollection.fee_policies.list_group',compact('groups','discount','late','grades','withdraw','list','schoolyears','id','i'));
	}

    public function editfees($id)
    {
		$group=SmFeesGroup::find($id);
		$years = SmAcademicYear::all()->where('id_group',$id);
		$fees = sm_fees::all()->where('fees_group',$id);
		
    	return view('backEnd.feesCollection.fee_policies.edit',['id'=>$id,'years'=>$years,'fees'=>$fees]);

    	
    }

    public function updatefees(Request $request)
    {
        try{
        	$fee_id=$request->fee_id;
        	
        	$year_id=$request->year_id;
        	$fees=str_replace(",","", $request->fees);
        	
        	$paymentA=str_replace(",","", $request->paymentA);
        	$paymentB1=str_replace(",","", $request->paymentB1);
        	$paymentB2=str_replace(",","", $request->paymentB2);
        	$paymentB3=str_replace(",","", $request->paymentB3);

        	

        	
        	 for($i=0;$i<count($fee_id);$i++)
        	 {
        	 	$update=sm_fees::find($fee_id[$i]);
        	 	$update->price=$fees[$i];
        	 	$update->save();
        	 	
        	 }

        	 

        	 for($i=0;$i<count($year_id);$i++)
        	 {
        	 	$update=SmAcademicYear::find($year_id[$i]);
        	 	$update->tuition_payment_A=$paymentA[$i];
        	 	$update->tuition_payment_B1=$paymentB1[$i];
        	 	$update->tuition_payment_B2=$paymentB2[$i];
        	 	$update->tuition_payment_B3=$paymentB3[$i];
        	 	$update->save();
        	 	
        	 }

    	 Toastr::success('Operation successful', 'Success');
            return redirect()->back(); 
        }catch (\Exception $e) {
           Toastr::error('Operation Failed', 'Failed');
           return redirect()->back(); 
        }
    }


    public function deletegrade($id)
    {
        $find=born_between::find($id);
        $find->delete();

        $find_relative=born_between_year::where('id_born',$id)->delete();
        

        Toastr::success('Operation successful', 'Success');
            return redirect()->back(); 
    }

    public function addgrade(Request $request)
    {
        $this->validate($request,
        [
            'born_from'=>'required',
            'born_to'=>'required'
            
        ]);

            $born_from=$request->born_from;
            $born_to = $request->born_to;

            ///create new born_between
            $born_between=new born_between;
            $born_between->from = $born_from;
            $born_between->to = $born_to;
            $born_between->save();
            ///create new born_between
            $year1=Carbon::parse($born_from)->year;
            $year2=Carbon::parse($born_to)->year;


            for ($i=1; $i <= 14 ; $i++) {  
                $pivot=new born_between_year;
                $pivot->id_born=$born_between->id;
                if($i<3)
                {
                    $pivot->id_year=null; //Bỏ 2 năm đầu 
                }
                else
                {
                    $pivot->id_year=$i-2; //3 tuổi sẽ vào pre-school
                }
                
                $pivot->school_year=intval($year1+$i)."-".intval($year2+$i);
                $pivot->save();
            }
            Toastr::success('Operation successful', 'Success');
            return redirect()->back(); 
        
    }   
}
