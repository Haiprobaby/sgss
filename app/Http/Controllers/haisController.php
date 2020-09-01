<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\SmCareers; 
Use App\SmNewsSubCategory;
Use App\SmNewsCategory;
Use App\SmNews;
use App\SmAdditionalFiles;
use Brian2694\Toastr\Facades\Toastr;
use File;
class haisController extends Controller
{
    public function parentsEssentials()
    {
    	try {
            $subcate = SmNewsSubCategory::where('category_id','7')->paginate(6);
            $name_cate = SmNewsCategory::find(7);
            $files = SmAdditionalFiles::all();
            return view('frontEnd.home.light_news_sub_category',compact('subcate','name_cate','files'));

        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function news_by_cate($id_cate)
    {
        try {
            $hotnews = SmNews::first();
            $newslist = SmNews::orderBy('created_at','desc')->take(4)->get();
            
            $list_cate = SmNewsCategory::all();
            
            $list_subcate = SmNewsSubCategory::where('category_id',$id_cate)->get();

            $newslist_by_cate = SmNewsCategory::find($id_cate)->news;

            return view('frontEnd.home.light_news_category',compact('id_cate','list_subcate','newslist','hotnews','list_cate','newslist_by_cate'));

        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function by_sub_cate($sub_cate_id)
    {
        try {
            $hotnews = SmNews::first();
            $newslist = SmNews::orderBy('created_at','desc')->take(4)->get();                      
            $list_cate = SmNewsCategory::all();
            $id_cate= SmNewsSubCategory::where('id',$sub_cate_id)->first()->category_id;
            $list_subcate = SmNewsSubCategory::where('category_id',$id_cate)->get();
            $newslist_by_cate = SmNewsSubCategory::find($sub_cate_id)->news->take(6);
            return view('frontEnd.home.light_news_category',compact('id_cate','sub_cate_id','list_subcate','newslist','hotnews','list_cate','newslist_by_cate'));

        } catch (\Exception $e) {
           Toastr::error('Operation Failed', 'Failed');
           return redirect()->back();
        }
    }

    public function files () /*Lấy danh sách các files*/
    {
        try {
            $files = SmAdditionalFiles::all();
            return view('backEnd.files.fileList',compact('files'));

        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function fileAdd(Request $request) /*Thêm file*/
    {
        $request->validate([
            'name' => 'required',
            'file_url' => 'required',
        ]);
        try{
            $add_file = new SmAdditionalFiles();
            $add_file->name=$request->name;
            $file=$request->file_url;
            $name = $file->getClientOriginalName();
            $name = str_random(7)."_".$name;
            $file->move(base_path('public\tailieu'),$name);
            $add_file->url = 'public/tailieu/'.$name;
            $result = $add_file->save();
            if ($result) {
                Toastr::success('Operation successful', 'Success');
                return redirect()->back();
            } else {
                Toastr::error('Operation Failed', 'Failed');
                return redirect()->back();
            }
        }catch (\Exception $e) {
           Toastr::error('Operation Failed', 'Failed');
           return redirect()->back(); 
        }
    }
    public function fileEdit ($id) /*Lấy file cần sửa*/
    {
        try{
            $files = SmAdditionalFiles::get();
            $editData = SmAdditionalFiles::find($id);
            

            return view('backEnd.files.fileList', compact('files', 'editData'));
        }catch (\Exception $e) {
           Toastr::error('Operation Failed', 'Failed');
           return redirect()->back(); 
        }
    }
    public function fileUpdate (Request $request) /*Sửa file*/
    {

        $request->validate([
            'name' => 'required',
        ]);
        try{
            $update_file = SmAdditionalFiles::find($request->id);
            $update_file->Name = $request->name;
            if($request->hasFile('file_url'))
            {
                $file_old =$update_file->url;
                if(File::exists($file_old)) 
                    { 
                        File::delete($file_old);   
                    } 

                $file=$request->file_url;
                $name = $file->getClientOriginalName();
                $name = str_random(7)."_".$name;
                $file->move(base_path('public/tailieu'),$name);
                $update_file->url = 'public/tailieu/'.$name;
            }
            $update_file->save();
            Toastr::success('Operation successful', 'Success');
            return redirect()->back();
        }catch (\Exception $e) {
           Toastr::error('Operation Failed', 'Failed');
           return redirect()->back(); 
        }
    }
    public function forDeleteFile($id) /*Lấy file cần xóa*/
    {
       
        try{
            return view('backEnd.files.delete_file', compact('id'));
        }catch (\Exception $e) {
           Toastr::error('Operation Failed', 'Failed');
           return redirect()->back(); 
        }
    }

    public function fileDelete($id) /*Xóa file đã chọn*/
    {
        try{
            $delete_file = SmAdditionalFiles::find($id);  
            $file_old =$delete_file->url;
            if(File::exists($file_old)) 
                { 
                    File::delete($file_old);   
                } 
            $delete_file->delete();
            Toastr::success('Operation successful', 'Success');
            return redirect('files');
        }catch (\Exception $e) {
           Toastr::error('Operation Failed', 'Failed');
           return redirect()->back(); 
        }
    }
}
