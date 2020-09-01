<?php

namespace App\Http\Controllers;

use App\SmCategoriesImagesAlbum;
use App\SmCategoriesImagesPhoto;
use App\SmCategoriesImagesDefaultAlbum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;

class SmCategoriesImagesController extends Controller
{
    public function index()
    {
        try {
            $album = SmCategoriesImagesAlbum::get()->map(function ($i) {
                return [
                    'album' => $i,
                    'gallery' => SmCategoriesImagesPhoto::where('album_id', $i->id)->get()
                ];
            });
            $display_album = SmCategoriesImagesDefaultAlbum::first();
            return view('backEnd.category.admin-category', compact('album', 'display_album'));
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function upload(Request $request)
    {
        $this->validate($request, [
            'title'     => 'required',
            'imgs'      => 'required|array',
            'imgs.*'    => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096'
        ]);

        try {
            DB::beginTransaction();
            $album = new SmCategoriesImagesAlbum();
            $album->title = $request->get('title');
            $album->save();

            if (!File::exists(public_path('/uploads/category/'))) {
                File::makeDirectory(public_path('/uploads/category/'));
            }

            foreach ($request->file('imgs') as $img) {
                $path = 'sgstar_' . $album->id;
                $file_name = $img->getClientOriginalName();

                if (!File::exists(public_path('/uploads/category/' . $path))) {
                    File::makeDirectory(public_path('/uploads/category/' . $path));
                }

                $resize_img = Image::make($img->getRealPath())->fit(900, 700);
                $resize_img->save(public_path('uploads/category/' . $path . '/' . $file_name));

                $photo = new SmCategoriesImagesPhoto();
                $photo->album_id = $album->id;
                $photo->path = $path . '/' . $file_name;
                $photo->save();
            }

            DB::commit();
            return back()->with('success', 'Images uploaded successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function display(Request $request)
    {
        $this->validate($request, [
            'display_album'     => 'required',
        ]);

        try {
            DB::beginTransaction();
            if (!SmCategoriesImagesDefaultAlbum::first()) {
                $display_album = new SmCategoriesImagesDefaultAlbum();
                $display_album->album_id = $request->get('display_album');
                $display_album->save();
            } else {
                $display_album = SmCategoriesImagesDefaultAlbum::first();
                $display_album->album_id = $request->get('display_album');
                $display_album->save();
            }
            DB::commit();
            return back()->with('success', 'Set display album successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function delete(Request $request)
    {
        try {
            $album_id = $request->get('album_id');

            DB::beginTransaction();
            SmCategoriesImagesAlbum::find($album_id)->delete();
            SmCategoriesImagesPhoto::where('album_id', $album_id)->delete();

            SmCategoriesImagesDefaultAlbum::where('album_id', $album_id)->delete();

            File::deleteDirectory(public_path('public/category/sgstar/' . $album_id));

            DB::commit();
            return back()->with('success', 'Delete album successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }
}
