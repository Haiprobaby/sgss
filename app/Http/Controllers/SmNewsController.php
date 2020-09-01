<?php

namespace App\Http\Controllers;
use App\SmNews;
use App\ApiBaseMethod;
use App\SmNewsCategory;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
//Hải thêm
use App\SmNewsSubCategory;
use File;
//Hải thêm end
class SmNewsController extends Controller
{

    public function index()
    {
        
        try{
            $news = SmNews::get();
            $news_category = SmNewsCategory::get();
            $news_sub_category = SmNewsSubCategory::get();
            return view('backEnd.news.news_page', compact('news', 'news_category','news_sub_category'));
        }catch (\Exception $e) {
           Toastr::error('Operation Failed', 'Failed');
           return redirect()->back(); 
        }
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required',         
            'sub_category_id' => 'required',
            'category_id' => 'required',
            'date' => 'required',
            'image' => 'required',
            'description' => 'required',
            'news_body' => 'required',
        ]);
        
        try{
            $news = new SmNews();
            $image = "";
            $date = strtotime($request->date);
            $newformat = date('Y-m-d', $date);
            if ($request->file('image') != "") {
                $file = $request->file('image');
                $image = 'stu-' . md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move('public/uploads/news/', $image);
                $image = 'public/uploads/news/' . $image;
            }

            $news->news_title = $request->title;
            $news->sub_category_id = $request->sub_category_id;
            $news->category_id = $request->category_id;
            $news->publish_date = $newformat;
            $news->image = $image;
            $news->description = $request->description;
            $news->news_body = $request->news_body;

            $result = $news->save();
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


    public function edit($id)
    {
        
        try{
            $news = SmNews::get();
            $add_news = SmNews::find($id);
            $news_category = SmNewsCategory::get();
            $news_sub_category = SmNewsSubCategory::get();
            return view('backEnd.news.news_page', compact('add_news', 'news', 'news_category','news_sub_category'));

        }catch (\Exception $e) {
           Toastr::error('Operation Failed', 'Failed');
           return redirect()->back(); 
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            
            'sub_category_id' => 'required',
            'category_id' => 'required',
            'date' => 'required',
            'description' => 'required',
            'news_body' => 'required',
        ]);

        try{
            $news = SmNews::find($request->id);
            $date = strtotime($request->date);
            $newformat = date('Y-m-d', $date);
            $image = "";
            $ok = false;
            if ($request->file('image') != "") {
                $news = SmNews::find($request->id);
                if ($news->image != "") {
                //    unlink($news->image);
                    $ok = true;
                }
    
                $file = $request->file('image');
                $image = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move('public/uploads/news/', $image);
                $image = 'public/uploads/news/' . $image;
            }
            $news = SmNews::find($request->id);
            $news->news_title = $request->title;
            $news->sub_category_id = $request->sub_category_id;
            $news->category_id = $request->category_id;
            $news->publish_date = $newformat;
            //if ($image != "") {
            if ($ok) {
                $news->image = $image;
            }
            $news->news_body = $request->news_body;
            $news->description = $request->description;
            $result = $news->save();
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


    public function newsDetails($id)
    {
        
        try{
            $news = SmNews::find($id);
            return view('backEnd.news.news_details', compact('news'));
        }catch (\Exception $e) {
           Toastr::error('Operation Failed', 'Failed');
           return redirect()->back(); 
        }
    }
    public function forDeleteNews($id)
    {
        
        try{
            return view('backEnd.news.delete_modal', compact('id'));
        }catch (\Exception $e) {
           Toastr::error('Operation Failed', 'Failed');
           return redirect()->back(); 
        }
    }

    public function delete($id)
    {
       
        try{
            $news = SmNews::find($id);
            $result = $news->delete();
            $image_path = base_path($news->image);  //Đường dẫn lưu tạm 
            if(File::exists($image_path)) 
            { 
                File::delete($image_path);   ///Xóa ảnh từ folder tạm sau khi dùng xong
            }
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

    public function newsCategory()
    {
        
        try{
            $newsCategories = SmNewsCategory::get();
            return view('backEnd.news.news_category', compact('newsCategories'));
        }catch (\Exception $e) {
           Toastr::error('Operation Failed', 'Failed');
           return redirect()->back(); 
        }
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
        ]);
        
        try{
            $news_category = new SmNewsCategory();
            $news_category->description = $request ->description;
            $news_category->category_name = $request->category_name;    
            $result = $news_category->save();
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

    public function editCategory($id)
    {        
        try{
            $newsCategories = SmNewsCategory::get();
            $editData = SmNewsCategory::find($id);
            return view('backEnd.news.news_category', compact('newsCategories', 'editData'));
        }catch (\Exception $e) {
           Toastr::error('Operation Failed', 'Failed');
           return redirect()->back(); 
        }
    }

    public function updateCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
        ]);
        
        try{
            $news_category = SmNewsCategory::find($request->id);
            $news_category->category_name = $request->category_name;
            $news_category->description = $request ->description;
            $result = $news_category->save();
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

    public function forDeleteNewsCategory($id)
    {
       
        try{
            return view('backEnd.news.category_delete_modal', compact('id'));
        }catch (\Exception $e) {
           Toastr::error('Operation Failed', 'Failed');
           return redirect()->back(); 
        }
    }

    public function deleteCategory(Request $request, $id)
    {
        try{
            $delete_query=SmNewsSubCategory::all()->where('category_id',$id);
            
                if ($delete_query->count()==0) {
                    Toastr::success('Operation successful', 'Success');
                    $delete=SmNewsCategory::destroy($id);                   
                    
                    return redirect()->back();              
                    
                } else {
                    Toastr::error('Operation Failed', 'the data has been used in another place,please delete it first!!!');
                    return redirect()->back();  
                }
        }catch(\Illuminate\Database\QueryException $e){
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function newsSubCategory()
    {
        
        try{
            $newsSubCategories = SmNewsSubCategory::get();
            $newsCategories = SmNewsCategory::get();
            return view('backEnd.news.news_sub_category', compact('newsSubCategories','newsCategories'));
        }catch (\Exception $e) {
           Toastr::error('Operation Failed', 'Failed');
           return redirect()->back(); 
        }
    }

    public function storeSubCategory(Request $request)
    {
        
        $request->validate([
            'sub_category_name' => 'required',
            'category_id' => 'required',
        ]);

        if($request->hasFile('image'))
        {
            $file=$request->image;
            $name = $file->getClientOriginalName();
            $name = str_random(7)."_".$name;
            $file->move(base_path('public\backEnd\img\_news'),$name);
        }
        else
        {
            $name = 'no_image';
        }
        
        try{
            $news_sub_category = new SmNewsSubCategory();
            $news_sub_category->sub_category_name = $request->sub_category_name; 
            $news_sub_category->category_id = $request->category_id;
            $news_sub_category->description = $request->description; 
            $news_sub_category->image = $name;
            $news_sub_category->image_path="public\backEnd\img\_news";
            $result = $news_sub_category->save();
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

    public function editSubCategory($id)
    {        
        try{
            $newsCategories = SmNewsCategory::get();
            $editData = SmNewsSubCategory::find($id);
            $newsSubCategories = SmNewsSubCategory::get();

            return view('backEnd.news.news_sub_category', compact('newsCategories', 'editData','newsSubCategories'));
        }catch (\Exception $e) {
           Toastr::error('Operation Failed', 'Failed');
           return redirect()->back(); 
        }
    }

    public function updateSubCategory(Request $request)
    {
        $request->validate([
            'sub_category_name' => 'required',
            'category_id' => 'required',
        ]);

        if($request->hasFile('image'))
        {
            $file=$request->image;
            $name = $file->getClientOriginalName();
            $name = str_random(7)."_".$name;
            $file->move(base_path('public\backEnd\img\_news'),$name);

            try{
            $news_sub_category = SmNewsSubCategory::find($request->id);
            $news_sub_category->sub_category_name = $request->sub_category_name; 
            $news_sub_category->category_id = $request->category_id;
            $news_sub_category->description = $request->description;
            $news_sub_category->image = $name;
            $news_sub_category->image_path="public\backEnd\img\_news";
            $result = $news_sub_category->save();
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
        else
        {
            try{
            $news_sub_category = SmNewsSubCategory::find($request->id);
            $news_sub_category->sub_category_name = $request->sub_category_name; 
            $news_sub_category->category_id = $request->category_id;
            $news_sub_category->description = $request->description;
            $news_sub_category->image_path="public\backEnd\img\_news";
            $result = $news_sub_category->save();
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
        
        
        
    }

    public function forDeleteSubCategory($id)
    {
       
        try{
            return view('backEnd.news.sub_cate_delete_modal', compact('id'));
        }catch (\Exception $e) {
           Toastr::error('Operation Failed', 'Failed');
           return redirect()->back(); 
        }
    }

    public function deleteSubCategory(Request $request, $id)
    {
        try{
            $delete_query=SmNews::all()->where('sub_category_id',$id);
            
                if ($delete_query->count()==0) {
                    $delete=SmNewsSubCategory::find($id);
                    $delete->delete();
                    $image_name = $delete->image;
                    $image_path = base_path($delete->image_path).'/'.$image_name;  //Đường dẫn 
                    if(File::exists($image_path)) 
                    { 
                        File::delete($image_path);   
                    }                   
                    Toastr::success('Operation successful', 'Success');
                    return redirect()->back();              
                    
                } else {
                    Toastr::error('Operation Failed', 'the data has been used in another place,please delete it first!!!');
                    return redirect()->back();  
                }
        }catch(\Illuminate\Database\QueryException $e){
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }
    
}
