<?php

namespace App\Http\Controllers;

use App\User;
use App\SmExam;
use App\SmNews;
use App\SmClass;
use App\SmEvent;
use App\SmStaff;
use App\SmCourse;
use App\SmSection;
use App\ApiBaseMethod;
use App\SmStudent;
use App\SmSubject;
use App\YearCheck;
use App\SmExamType;
use App\SmNewsPage;
use App\SmAboutPage;
use App\SmCategoriesImagesAlbum;
use App\SmCategoriesImagesDefaultAlbum;
use App\SmCategoriesImagesPhoto;
use App\SmCoursePage;
use App\SmCustomLink;
use App\SmContactPage;
use App\SmNoticeBoard;
use App\SmTestimonial;
use App\SmContactMessage;
use App\SmSocialMediaIcon;
use App\SmGeneralSettings;
use App\SmVisitor;
use App\SmHomePageSetting;
use Illuminate\Http\Request;
use App\SmFrontendPersmission;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\FeesGroup;
use App\SmFeesGroup;
use App\sm_fees;
use App\Form1;
use App\SmPaymentMethhod;
use Dotenv\Validator;
use App\smroute;
use App\SmFeesDiscount;
use App\late_enrolment;
use App\school_grades;
use App\withdraw;
Use App\born_between;
Use App\born_between_year;
Use App\SmFeesNotes;
Use \Carbon\Carbon;
Use App\SmCareers; 
Use File;
Use App\SmParent;
Use App\SmNewsSubCategory;
Use App\SmNewsCategory;
Use App\SmAcademicYear; // Long 31/08

class SmFrontendController extends Controller
{

    public function __construct()
    {
        $this->middleware('PM');
        // User::checkAuth();
    }
    /**
     * Display a caretogy images.
     *
     * @return \Illuminate\Http\Response
     */

    public function category()
    {
        try {
            $album = SmCategoriesImagesAlbum::get()->map(function ($i) {
                return [
                    'album' => $i,
                    'gallery' => SmCategoriesImagesPhoto::where('album_id', $i->id)->get()
                ];
            });

            return view('frontEnd.home.light_category', compact('album'));
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try {
            if (Schema::hasTable('users')) {
                $testInstalled = DB::table('users')->get();
                if (count($testInstalled) < 1) {
                    return view('install.welcome_to_infix');
                } else {
                    $exams = SmExam::all();
                    $news = SmNews::orderBy('order', 'asc')->limit(3)->get();
                    $testimonial = SmTestimonial::all();
                    $academics = SmCourse::orderBy('id', 'asc')->limit(3)->get();
                    $exams_types = SmExamType::all();
                    $events = SmEvent::all();
                    $a = 2;
                    $b = 3;
                    $c = 9;
                    $notice_board = SmNoticeBoard::where('is_published', 1)->orderBy('created_at', 'DESC')->take(3)->get();
                    $classes = SmClass::where('active_status', 1)->get();
                    $subjects = SmSubject::where('active_status', 1)->get();
                    $sections = SmSection::where('active_status', 1)->get();
                    $links = SmCustomLink::find(1);
                    $homePage = SmHomePageSetting::find(1);
                    $permisions = SmFrontendPersmission::where([['parent_id', 1], ['is_published', 1]])->get();
                    $per = [];
                    foreach ($permisions as $permision) {
                        $per[$permision->name] = 1;
                    }
                    $button_settings = SmGeneralSettings::find(1);

                    $url = explode('/', $button_settings->website_url);
                    if ($button_settings->website_btn == 0) {
                        return redirect('login');
                    } else {
                        if (!SmCategoriesImagesDefaultAlbum::first()) {
                            $photo = [];
                        } else {
                            $photo = SmCategoriesImagesPhoto::where('album_id', SmCategoriesImagesDefaultAlbum::first()->album_id)->get();
                        }

                        if ($button_settings->website_url == '') {

                            if (SmGeneralSettings::isModule('Saas') == TRUE) {

                                $contact_info = SmContactPage::first();
                                if (SmGeneralSettings::isModule('SaasSubscription') == TRUE) {

                                    $packages = \Modules\SaasSubscription\Entities\SmPackagePlan::where('active_status', 1)->get();
                                } else {
                                    $packages = [];
                                }

                                return view('saas::auth.saas_landing', compact('contact_info', 'packages'));
                            } else {
                                return view('frontEnd.home.light_home', compact('exams', 'classes', 'subjects', 'exams_types', 'sections', 'news', 'testimonial', 'notice_board', 'events', 'academics', 'links', 'homePage', 'per', 'photo'));
                            }
                        } elseif ($url[max(array_keys($url))] == 'home') {

                            if (SmGeneralSettings::isModule('Saas') == TRUE) {
                                $contact_info = SmContactPage::first();
                                return view('saas::auth.saas_landing', compact('contact_info'));
                            } else {
                                return view('frontEnd.home.light_home', compact('exams', 'classes', 'subjects', 'exams_types', 'sections', 'news', 'testimonial', 'notice_board', 'events', 'academics', 'links', 'homePage', 'per', 'photo'));
                            }
                        } else {
                            $url = $button_settings->website_url;
                            return Redirect::to($url);
                        }
                    }
                }
            } else {
                return view('install.welcome_to_infix');
            }
        } catch (\Exception $e) {
            // dd($e);
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function about()
    {
        try {
            $exams = SmExam::all();
            $exams_types = SmExamType::all();
            $classes = SmClass::where('active_status', 1)->get();
            $subjects = SmSubject::where('active_status', 1)->get();
            $sections = SmSection::where('active_status', 1)->get();
            $about = SmAboutPage::first();
            $testimonial = SmTestimonial::all();
            $totalStudents = SmStudent::where('active_status', 1)->get();
            $totalTeachers = SmStaff::where('active_status', 1)->where('role_id', 4)->get();
            $history = SmNews::where('category_id', 2)->limit(3)->get();
            $mission = SmNews::where('category_id', 3)->limit(3)->get();
            return view('frontEnd.home.light_about', compact('exams', 'classes', 'subjects', 'exams_types', 'sections', 'about', 'testimonial', 'totalStudents', 'totalTeachers', 'history', 'mission'));
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function news()
    {

        try {
            $exams = SmExam::all();
            $exams_types = SmExamType::all();
            $classes = SmClass::where('active_status', 1)->get();
            $subjects = SmSubject::where('active_status', 1)->get();
            $sections = SmSection::where('active_status', 1)->get();
            return view('frontEnd.home.light_news', compact('exams', 'classes', 'subjects', 'exams_types', 'sections'));
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function contact()
    {

        try {
            $exams = SmExam::all();
            $exams_types = SmExamType::all();
            $classes = SmClass::where('active_status', 1)->get();
            $subjects = SmSubject::where('active_status', 1)->get();
            $sections = SmSection::where('active_status', 1)->get();

            $contact_info = SmContactPage::first();
            return view('frontEnd.home.light_contact', compact('exams', 'classes', 'subjects', 'exams_types', 'sections', 'contact_info'));
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }
    public function institutionPrivacyPolicy()
    {

        try {
            $exams = SmExam::all();
            $exams_types = SmExamType::all();
            $classes = SmClass::where('active_status', 1)->get();
            $subjects = SmSubject::where('active_status', 1)->get();
            $sections = SmSection::where('active_status', 1)->get();

            $contact_info = SmContactPage::first();
            return view('frontEnd.home.institutionPrivacyPolicy', compact('exams', 'classes', 'subjects', 'exams_types', 'sections', 'contact_info'));
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    
    public function institutionTermServices()
    {

        try {
            $exams = SmExam::all();
            $exams_types = SmExamType::all();
            $classes = SmClass::where('active_status', 1)->get();
            $subjects = SmSubject::where('active_status', 1)->get();
            $sections = SmSection::where('active_status', 1)->get();

            $contact_info = SmContactPage::first();
            return view('frontEnd.home.institutionTermServices', compact('exams', 'classes', 'subjects', 'exams_types', 'sections', 'contact_info'));
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function newsDetails($id)
    {

        try {
            $news = SmNews::find($id);
            $otherNews = SmNews::orderBy('id', 'asc')->whereNotIn('id', [$id])->limit(3)->get();
            $a = 2;
            $b = 3;
            $c = 9;
            $notice_board = SmNoticeBoard::where('is_published', 1)->orderBy('created_at', 'DESC')->take(3)->get();
            return view('frontEnd.home.light_news_details', compact('news', 'notice_board', 'otherNews'));
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function newsPage()
    {
        //try {
            $hotnews = SmNews::first();
            $newslist = SmNews::orderBy('created_at','desc')->take(4)->get();
            $list_cate = SmNewsCategory::all();
            $latest_news = SmNews::orderBy('updated_at', 'desc')->take(6)->get();
            return view('frontEnd.home.light_news_category',compact('latest_news','newslist','hotnews','list_cate'));

        // } catch (\Exception $e) {
        //     Toastr::error('Operation Failed', 'Failed');
        //     return redirect()->back();
        // }
    }
    public function subcate($id)
    {
        try {
            $subcate = SmNewsSubCategory::where('category_id',$id)->paginate(6);
            $name_cate = SmNewsCategory::find($id);
            return view('frontEnd.home.light_news_sub_category',compact('subcate','name_cate'));

        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function category_items($id)
    {
        try {
            $name_subcate=SmNewsSubCategory::find($id);
            $items=SmNews::where('sub_category_id',$id)->orderBy('created_at','desc')->get();
            
            return view('frontEnd.home.category_items',compact('items','name_subcate'));

        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
        
    }

    public function conpactPage()
    {

        try {
            $contact_us = SmContactPage::first();
            return view('frontEnd.contact_us', compact('contact_us'));
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function contactPageEdit()
    {

        try {
            $contact_us = SmContactPage::first();
            $update = "";

            return view('frontEnd.contact_us', compact('contact_us', 'update'));
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function contactPageStore(Request $request)
    {

        if ($request->file('image') == "") {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'button_text' => 'required',
                'button_url' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'latitude' => 'required',
                'longitude' => 'required',
                'google_map_address' => 'required',
            ]);
        } else {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'button_text' => 'required',
                'button_url' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'latitude' => 'required',
                'longitude' => 'required',
                'google_map_address' => 'required',
                'image' => 'dimensions:min_width=1420,min_height=450',
            ]);
        }

        try {
            $fileName = "";
            if ($request->file('image') != "") {
                $contact = SmContactPage::find(1);
                if ($contact != "") {
                    if ($contact->image != "") {
                        if (file_exists($contact->image)) {
                            unlink($contact->image);
                        }
                    }
                }

                $file = $request->file('image');
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move('public/uploads/contactPage/', $fileName);
                $fileName = 'public/uploads/contactPage/' . $fileName;
            }

            $contact = SmContactPage::first();
            if ($contact == "") {
                $contact = new SmContactPage();
            }
            $contact->title = $request->title;
            $contact->description = $request->description;
            $contact->button_text = $request->button_text;
            $contact->button_url = $request->button_url;

            $contact->address = $request->address;
            $contact->address_text = $request->address_text;
            $contact->phone = $request->phone;
            $contact->phone_text = $request->phone_text;
            $contact->email = $request->email;
            $contact->email_text = $request->email_text;
            $contact->latitude = $request->latitude;
            $contact->longitude = $request->longitude;
            $contact->google_map_address = $request->google_map_address;
            if ($fileName != "") {
                $contact->image = $fileName;
            }

            $result = $contact->save();

            if ($result) {
                Toastr::success('Operation successful', 'Success');
                return redirect('contact-page');
            } else {
                Toastr::error('Operation Failed', 'Failed');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function aboutPage()
    {

        try {
            $about_us = SmAboutPage::first();
            return view('frontEnd.about_us', compact('about_us'));
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function aboutPageEdit()
    {

        try {
            $about_us = SmAboutPage::first();
            $update = "";

            return view('frontEnd.about_us', compact('about_us', 'update'));
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function newsHeading()
    {

        try {
            $SmNewsPage = SmNewsPage::first();
            $update = "";

            return view('backEnd.news.newsHeadingUpdate', compact('SmNewsPage', 'update'));
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function newsHeadingUpdate(Request $request)
    {

        if ($request->file('image') == "" && $request->file('main_image') == "") {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'main_title' => 'required',
                'main_description' => 'required',
                'button_text' => 'required',
                'button_url' => 'required',
            ]);
        } elseif ($request->file('image') != "" && $request->file('main_image') != "") {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'main_title' => 'required',
                'main_description' => 'required',
                'button_text' => 'required',
                'button_url' => 'required',
                'image' => 'dimensions:min_width=1420,min_height=450',
                'main_image' => 'dimensions:min_width=1420,min_height=450',
            ]);
        } elseif ($request->file('image') != "" && $request->file('main_image') == "") {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'main_title' => 'required',
                'main_description' => 'required',
                'button_text' => 'required',
                'button_url' => 'required',
                'image' => 'dimensions:min_width=1420,min_height=450',
            ]);
        } elseif ($request->file('image') == "" && $request->file('main_image') != "") {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'main_title' => 'required',
                'main_description' => 'required',
                'button_text' => 'required',
                'button_url' => 'required',
                'main_image' => 'dimensions:min_width=1420,min_height=450',
            ]);
        }

        try {
            $fileName = "";
            if ($request->file('image') != "") {
                $about = SmNewsPage::find(1);
                if ($about != "") {
                    if ($about->image != "") {
                        if (file_exists($about->image)) {
                            unlink($about->image);
                        }
                    }
                }

                $file = $request->file('image');
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move('public/uploads/about_page/', $fileName);
                $fileName = 'public/uploads/about_page/' . $fileName;
            }

            $mainfileName = "";
            if ($request->file('main_image') != "") {
                $about = SmNewsPage::find(1);
                if ($about != "") {
                    if ($about->main_image != "") {
                        if (file_exists($about->main_image)) {
                            unlink($about->main_image);
                        }
                    }
                }

                $file = $request->file('main_image');
                $mainfileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move('public/uploads/about_page/', $mainfileName);
                $mainfileName = 'public/uploads/about_page/' . $mainfileName;
            }

            $about = SmNewsPage::first();
            if ($about == "") {
                $about = new SmNewsPage();
            }
            $about->title = $request->title;
            $about->description = $request->description;
            $about->main_title = $request->main_title;
            $about->main_description = $request->main_description;
            $about->button_text = $request->button_text;
            $about->button_url = $request->button_url;
            if ($fileName != "") {
                $about->image = $fileName;
            }
            if ($mainfileName != "") {
                $about->main_image = $mainfileName;
            }
            $result = $about->save();

            if ($result) {
                Toastr::success('Operation successful', 'Success');
                return redirect('news-heading-update');
            } else {
                Toastr::error('Operation Failed', 'Failed');
                return redirect('news-heading-update');
            }
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }
    // end heading update

    public function courseHeading()
    {

        try {
            $SmCoursePage = SmCoursePage::first();
            $update = "";

            return view('backEnd.course.courseHeadingUpdate', compact('SmCoursePage', 'update'));
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function courseHeadingUpdate(Request $request)
    {

        if ($request->file('image') == "" && $request->file('main_image') == "") {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'main_title' => 'required',
                'main_description' => 'required',
                'button_text' => 'required',
                'button_url' => 'required',
            ]);
        } elseif ($request->file('image') != "" && $request->file('main_image') != "") {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'main_title' => 'required',
                'main_description' => 'required',
                'button_text' => 'required',
                'button_url' => 'required',
                'image' => 'dimensions:min_width=1420,min_height=450',
                'main_image' => 'dimensions:min_width=1420,min_height=450',
            ]);
        } elseif ($request->file('image') != "" && $request->file('main_image') == "") {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'main_title' => 'required',
                'main_description' => 'required',
                'button_text' => 'required',
                'button_url' => 'required',
                'image' => 'dimensions:min_width=1420,min_height=450',
            ]);
        } elseif ($request->file('image') == "" && $request->file('main_image') != "") {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'main_title' => 'required',
                'main_description' => 'required',
                'button_text' => 'required',
                'button_url' => 'required',
                'main_image' => 'dimensions:min_width=1420,min_height=450',
            ]);
        }

        try {
            $fileName = "";
            if ($request->file('image') != "") {
                $about = SmCoursePage::find(1);
                if ($about != "") {
                    if ($about->image != "") {
                        if (file_exists($about->image)) {
                            unlink($about->image);
                        }
                    }
                }

                $file = $request->file('image');
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move('public/uploads/about_page/', $fileName);
                $fileName = 'public/uploads/about_page/' . $fileName;
            }

            $mainfileName = "";
            if ($request->file('main_image') != "") {
                $about = SmCoursePage::find(1);
                if ($about != "") {
                    if ($about->main_image != "") {
                        if (file_exists($about->main_image)) {
                            unlink($about->main_image);
                        }
                    }
                }

                $file = $request->file('main_image');
                $mainfileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move('public/uploads/about_page/', $mainfileName);
                $mainfileName = 'public/uploads/about_page/' . $mainfileName;
            }

            $about = SmCoursePage::first();
            if ($about == "") {
                $about = new SmCoursePage();
            }
            $about->title = $request->title;
            $about->description = $request->description;
            $about->main_title = $request->main_title;
            $about->main_description = $request->main_description;
            $about->button_text = $request->button_text;
            $about->button_url = $request->button_url;
            if ($fileName != "") {
                $about->image = $fileName;
            }
            if ($mainfileName != "") {
                $about->main_image = $mainfileName;
            }
            $result = $about->save();

            if ($result) {
                Toastr::success('Operation successful', 'Success');
                return redirect('course-heading-update');
            } else {
                Toastr::error('Operation Failed', 'Failed');
                return redirect('course-heading-update');
            }
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function aboutPageStore(Request $request)
    {

        if ($request->file('image') == "" && $request->file('main_image') == "") {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'main_title' => 'required',
                'main_description' => 'required',
                'button_text' => 'required',
                'button_url' => 'required',
            ]);
        } elseif ($request->file('image') != "" && $request->file('main_image') != "") {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'main_title' => 'required',
                'main_description' => 'required',
                'button_text' => 'required',
                'button_url' => 'required',
                'image' => 'dimensions:min_width=1420,min_height=450',
                'main_image' => 'dimensions:min_width=1420,min_height=450',
            ]);
        } elseif ($request->file('image') != "" && $request->file('main_image') == "") {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'main_title' => 'required',
                'main_description' => 'required',
                'button_text' => 'required',
                'button_url' => 'required',
                'image' => 'dimensions:min_width=1420,min_height=450',
            ]);
        } elseif ($request->file('image') == "" && $request->file('main_image') != "") {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'main_title' => 'required',
                'main_description' => 'required',
                'button_text' => 'required',
                'button_url' => 'required',
                'main_image' => 'dimensions:min_width=1420,min_height=450',
            ]);
        }

        try {
            $fileName = "";
            if ($request->file('image') != "") {
                $about = SmAboutPage::find(1);
                if ($about != "") {
                    if ($about->image != "") {
                        if (file_exists($about->image)) {
                            unlink($about->image);
                        }
                    }
                }

                $file = $request->file('image');
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move('public/uploads/about_page/', $fileName);
                $fileName = 'public/uploads/about_page/' . $fileName;
            }

            $mainfileName = "";
            if ($request->file('main_image') != "") {
                $about = SmAboutPage::find(1);
                if ($about != "") {
                    if ($about->main_image != "") {
                        if (file_exists($about->main_image)) {
                            unlink($about->main_image);
                        }
                    }
                }

                $file = $request->file('main_image');
                $mainfileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move('public/uploads/about_page/', $mainfileName);
                $mainfileName = 'public/uploads/about_page/' . $mainfileName;
            }

            $about = SmAboutPage::first();
            if ($about == "") {
                $about = new SmAboutPage();
            }
            $about->title = $request->title;
            $about->description = $request->description;
            $about->main_title = $request->main_title;
            $about->main_description = $request->main_description;
            $about->button_text = $request->button_text;
            $about->button_url = $request->button_url;
            if ($fileName != "") {
                $about->image = $fileName;
            }
            if ($mainfileName != "") {
                $about->main_image = $mainfileName;
            }
            $result = $about->save();

            if ($result) {
                Toastr::success('Operation successful', 'Success');
                return redirect('about-page');
            } else {
                Toastr::error('Operation Failed', 'Failed');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function sendMessage(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['subject'] = $request->subject;
        $data['message'] = $request->message;

        DB::beginTransaction();
        try {
            $contact_message = new SmContactMessage();
            $contact_message->name = $request->name;
            $contact_message->email = $request->email;
            $contact_message->subject = $request->subject;
            $contact_message->message = $request->message;
            $result = $contact_message->save();

            Mail::send('frontEnd.contact_mail', compact('data'), function ($message) use ($request) {

                $setting = SmGeneralSettings::find(1);
                $email = $setting->email;
                $school_name = $setting->school_name;
                $message->to($email, $school_name)->subject($request->subject);
                $message->from($email, $school_name);
            });

            DB::commit();
            if ($result) {
                Toastr::success('Operation successful', 'Success');
                return redirect()->back()->with('message-success', 'Message send successfully');
            } else {
                Toastr::error('Operation Failed', 'Failed');
                return redirect()->back()->with('message-danger', 'Something went wrong, please try again');
            }
            // Toastr::success('Operation successful', 'Success');
            // return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back()->with('message-danger', 'Something went wrong, please try again');
        }
    }

    public function contactMessage(Request $request)
    {

        try {
            $contact_messages = SmContactMessage::orderBy('id', 'desc')->get();

            return view('frontEnd.contact_message', compact('contact_messages'));
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    //user register method start
    public function register()
    {

        try {
            $schools = SmSchool::where('active_status', 1)->get();
            return view('auth.registerCodeCanyon', compact('schools'));
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function customer_register(Request $request)
    {

        $request->validate([
            'fullname' => 'required|min:3|max:100',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6',
        ]);

        try {
            //insert data into user table
            $s = new User();
            $s->role_id = 4;
            $s->full_name = $request->fullname;
            $s->username = $request->email;
            $s->email = $request->email;
            $s->active_status = 0;
            $s->access_status = 0;
            $s->password = Hash::make($request->password);
            $s->save();
            $result = $s->toArray();
            $last_id = $s->id; //last id of user table

            //insert data into staff table
            $st = new SmStaff();
            $st->school_id = 1;
            $st->user_id = $last_id;
            $st->role_id = 4;
            $st->first_name = $request->fullname;
            $st->full_name = $request->fullname;
            $st->last_name = '';
            $st->staff_no = 10;
            $st->email = $request->email;
            $st->active_status = 0;
            $st->save();

            $result = $st->toArray();
            if (!empty($result)) {
                Toastr::success('Operation successful', 'Success');
                return redirect('login');
            } else {
                Toastr::error('Operation Failed', 'Failed');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            Toastr::error('Operation Failed,' . $e->getMessage(), 'Failed');
            return redirect()->back();
        }
    }

    public function course()
    {

        try {
            $exams = SmExam::all();
            $course = SmCourse::all();
            $news = SmNews::orderBy('order', 'asc')->limit(4)->get();
            $exams_types = SmExamType::all();
            $coursePage = SmCoursePage::first();
            $classes = SmClass::where('active_status', 1)->get();
            $subjects = SmSubject::where('active_status', 1)->get();
            $sections = SmSection::where('active_status', 1)->get();
            return view('frontEnd.home.light_course', compact('exams', 'classes', 'coursePage', 'subjects', 'exams_types', 'sections', 'course', 'news'));
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function courseDetails($id)
    {

        try {
            $course = SmCourse::find($id);
            $courses = SmCourse::orderBy('id', 'asc')->whereNotIn('id', [$id])->limit(3)->get();
            return view('frontEnd.home.light_course_details', compact('course', 'courses'));
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function socialMedia()
    {
        $visitors = SmSocialMediaIcon::all();

        return view('frontEnd.socialMedia', compact('visitors'));
    }

    public function socialMediaStore(Request $request)
    {

        $request->validate([
            'url' => 'required',
            'icon' => 'required',
            // 'icon' => 'required|dimensions:min_width=24,max_width=24',
            'status' => 'required',
        ]);

        try {

            // $fileName = "";
            // if ($request->file('icon') != "") {
            //     $file = $request->file('icon');
            //     $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            //     $file->move('public/uploads/socialIcon/', $fileName);
            //     $fileName = 'public/uploads/socialIcon/' . $fileName;
            // }

            $visitor = new SmSocialMediaIcon();
            $visitor->url = $request->url;
            $visitor->icon = $request->icon;
            $visitor->status = $request->status;
            $result = $visitor->save();

            if (ApiBaseMethod::checkUrl($request->fullUrl())) {
                if ($result) {

                    return ApiBaseMethod::sendResponse(null, 'Created successfully.');
                }
                return ApiBaseMethod::sendError('Something went wrong, please try again.');
            } else {
                if ($result) {
                    Toastr::success('Operation successful', 'Success');
                    return redirect()->back();
                }
                Toastr::error('Operation Failed', 'Failed');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function socialMediaEdit($id)
    {
        $visitors = SmSocialMediaIcon::all();
        $visitor = SmSocialMediaIcon::find($id);

        return view('frontEnd.socialMedia', compact('visitors', 'visitor'));
    }


    public function socialMediaUpdate(Request $request)
    {

        $request->validate([
            'url' => 'required',
            'icon' => 'required',
            // 'icon' => 'dimensions:min_width=24,max_width=24',
            'status' => 'required',
        ]);

        try {

            $visitor = SmSocialMediaIcon::find($request->id);
            $visitor->url = $request->url;
            $visitor->icon = $request->icon;
            $visitor->status = $request->status;
            $result = $visitor->save();

            if (ApiBaseMethod::checkUrl($request->fullUrl())) {
                if ($result) {

                    return ApiBaseMethod::sendResponse(null, 'Updated successfully.');
                }
                return ApiBaseMethod::sendError('Something went wrong, please try again.');
            } else {
                if ($result) {

                    Toastr::success('Operation successful', 'Success');
                    return redirect('social-media');
                }
                Toastr::error('Operation Failed', 'Failed');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }
    /* start Cao văn anh */
    public function teachers(){
        return view('frontEnd.home.teachers');
    }
     /* end Cao văn anh */


    public function socialMediaDelete(Request $request, $id)
    {

        try {
            $visitor = SmSocialMediaIcon::find($id);
            // if ($visitor->icon != "") {
            //     if (file_exists($visitor->icon)) {
            //         unlink($visitor->icon);
            //     }
            // }
            $result = $visitor->delete();

            if (ApiBaseMethod::checkUrl($request->fullUrl())) {
                if ($result) {
                    return ApiBaseMethod::sendResponse(null, 'Deleted successfully.');
                } else {
                    return ApiBaseMethod::sendError('Something went wrong, please try again.');
                }
            } else {
                if ($result) {
                    Toastr::success('Operation successful', 'Success');
                    return redirect('social-media');
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
    /* start Enrolment Danh Phi Long */
    public function enrolment_index()
    {
        return redirect('enrolment/step_1');
    }

    public function enrolment_1()
    {
        try {
            return view('frontEnd.home.light_enrolment');
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function enrolment_1s(Request $request)
    {
        $valid = $request->validate([
            'student_full_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'date_of_birth' => 'required|date_format:m/d/Y',
            'gender' => 'required',
            'session' => 'required',
            'first_nationality' => 'required|regex:/^[\pL\s\-]+$/u',
            'residential_address_in_vietnam' => 'required|min:5|max:150',
            'student_lives_with' => 'required',
            'fathers_full_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'fathers_nationality' => 'required|regex:/^[\pL\s\-]+$/u',
            'fathers_contact_phone_number' => 'required|numeric',
            'fathers_email_address' => 'required|min:5|max:150',
            'mothers_full_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'mothers_nationality' => 'required|regex:/^[\pL\s\-]+$/u',
            'mothers_contact_phone_number' => 'required|numeric',
            'mothers_email_address' => 'required|min:5|max:150',
            'emergency_full_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'emergency_relationship_to_parents' => 'required|regex:/^[\pL\s\-]+$/u',
            'emergency_contact_phone_number' => 'required|numeric',
            'school_name' => 'required',
            'location_or_country' => 'required|regex:/^[\pL\s\-]+$/u',
            'language_of_instruction' => 'required|regex:/^[\pL\s\-]+$/u',
            'from' => 'required|numeric',
            'to' => 'required|numeric',
            'childs_first_language' => 'required|regex:/^[\pL\s\-]+$/u',
            'level_of_E_language_experience' => 'required|numeric',
            'answer1' => 'required|max:150',
            'answer2' => 'required|max:150',
            'answer3' => 'required|max:150',
            'answer4' => 'required|max:150',
            'answer5' => 'required|max:150',
            'health_permissions' => 'required',
            'lunch_requested' => 'required',
            'school_bus' => 'required',
            'payment_by' => 'required',
            'VAT' => 'required',
            'other_permissions' => 'required'
        ]);

        try {
            $request->flash();
            return redirect('enrolment/step_2');
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function enrolment_2(Request $request)
    {
        $input = $request->old();
        if (!$input) {
            return redirect('enrolment');
        }
        $fees = FeesGroup::where("fees_group", $input["session"])->get();
        $tuition_fees = SmAcademicYear::where("id_group", $input["session"])->get();
        $classes = DB::table('sm_class_sections')->where('class_id', '=', $input['session'])
            ->join('sm_classes','sm_class_sections.class_id','=','sm_classes.id')
            ->get();
        
        return view('frontEnd.home.light_enrolment_2', compact('fees', 'tuition_fees', 'classes'));
    }

    public function enrolment_2s(Request $request)
    {
        $valid = $request->validate([
            'class' => 'required'
        ]);
        try {   
            // upload
            if ($request->file('avt')) {
                $file_name = 'tmp_'.md5(SmStudent::max('admission_no') + 1).'.png';
                $resize_img = Image::make($request->file('avt'))->fit(100, 100);
                $resize_img->save(public_path('uploads/student/' . $file_name));
                session(['avt' => $file_name]);
            }

            $request->all();
            $request->flash();
            return redirect("/enrolment/step_3");
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function enrolment_3(Request $request)
    {
        try {
            $input = $request->old();
            if (!$input) {
                return redirect('enrolment');
            }
            $payment_methods = SmPaymentMethhod::get();
            return view('frontEnd.home.light_enrolment_3', compact("payment_methods"));
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function enrolment_3s(Request $request)
    {
        $valid = $request->validate([
            'price' => 'required|numeric|min:0',
            'method' => 'required'
        ]);
        try {
            $request->all();
            $request->flash();
            return redirect("/enrolment/finished");
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function enrolment_finished(Request $request)
    {
        try {
            $input = $request->old();
            if (!$input) {
                return redirect('enrolment');
            }

            // user
            $tmp_email = 'sgstar'.str_pad(SmStudent::max('id') + 1, 3, '0', STR_PAD_LEFT).'@sgstar.edu.vn'; // 2708_Long

            $user_stu = new User();
            $user_stu->role_id = 2;
            $user_stu->full_name = $input['student_full_name'];
            $user_stu->username = $tmp_email;
            $user_stu->email = $tmp_email;
            $user_stu->password = Hash::make(123456);
            $user_stu->save();

            // user_parents
            $user_parent = new User();
            $user_parent->role_id = 3;
            $user_parent->full_name = $input['fathers_full_name'];
            $user_parent->username  = $input['fathers_email_address'];
            $user_parent->email = $input['fathers_email_address']; 
            $user_parent->password = Hash::make(123456);
            $user_parent->save();

            // parents
            $parent = new SmParent();
            $parent->user_id = $user_parent->id;
            $parent->fathers_name = $input['fathers_full_name'];
            $parent->fathers_mobile = $input['fathers_contact_phone_number'];
            //$parent->fathers_occupation = $value->fathe_occupation;
            $parent->mothers_name = $input['mothers_full_name'];
            $parent->mothers_mobile = $input['mothers_contact_phone_number'];
            //$parent->mothers_occupation = $value->mother_occupation;
            $parent->guardians_name = $input['emergency_full_name'];
            $parent->guardians_mobile = $input['emergency_contact_phone_number'];
            // $parent->guardians_occupation = $value->guardian_occupation;
            // $parent->guardians_relation = $value->relation;
            // $parent->relation = $value->relationButton;
            // $parent->guardians_address = $value->guardian_address;
            $parent->save();

            // store student
            $student = new SmStudent();
            $student->admission_no = 'sgstar'.str_pad(SmStudent::max('id') + 1, 3, '0', STR_PAD_LEFT); // 2708_Long
            $student->roll_no = SmStudent::max('roll_no') + 1;
            $student->class_id = $input['class'];
            $student->section_id = $input['session'];
            $student->student_category_id = $input['session'];
            $student->user_id = $user_stu->id;
            $student->parent_id = $parent->id;
            $student->mobile = $input['fathers_contact_phone_number'];
            $student->full_name  = $input['student_full_name'];
            $student->gender_id = $input['gender'];
            $student->date_of_birth = date('Y-m-d', strtotime($input['date_of_birth']));
            
            $student->session_id = 1;
            $student->role_id = 1;

            // avatar
            if ($input['avt']) {
              $student->student_photo = "public/uploads/student/".session('avt');
            }

            $student->save();
            
            return view('frontEnd.home.light_enrolment_finished', compact('student'));
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }
    /* Phạm Trọng hải*/
     public function admissions()
    {
          ///lấy danh sách các group 
        $early= SmFeesGroup::find(1);
        $primary = SmFeesGroup::find(2);
        $middle=SmFeesGroup::find(3);
        $withdraw=withdraw::all();
        $bus = smroute::all(); //lấy tất cả phí xe buýt
        $discount=SmFeesDiscount::where('type',null)->get(); //lấy tất cả discount
        $late_enrolment=late_enrolment::all(); //lấy tất cả phí ghi danh muộn
        $notes=SmFeesNotes::all();

        $thisyear=Carbon::now()->year;                          //lấy năm hiện tại
        $previousSchoolYear=($thisyear-1)."-".$thisyear;        //Lấy niên khóa trước
        $thisSchoolYear=$thisyear."-".($thisyear+1);            //lấy niên khóa hiện tại
        $nextSchoolYear=($thisyear+1)."-".($thisyear+2);        //lấy niên khóa tiếp theo
              //lấy niên khóa kế sau 

        $schoolyears=[];                                        //tạo mảng schoolyears trống 
        array_push($schoolyears,$previousSchoolYear,$thisSchoolYear,$nextSchoolYear);      //đẩy các niên khóa đã lấy được vào mảng schoolyears

        $born_between=DB::table('born_between')->orderby('id','desc')->limit(14)->get(); //lấy 14 niên khóa gần nhất
        $grades=[]; 
        $fromto=[];

        for ($i=0; $i < $born_between->count() ; $i++) { 
            $grades[$i]=born_between_year::where('id_born',$born_between[$i]->id)               
                                                    ->whereIn('school_year',$schoolyears) //gọi mảng schoolyears làm điều kiện truy vấn
                                                    ->orderby('id','asc')
                                                    ->get();
            $from=$born_between[$i]->from;  //lấy ngày sinh bắt đầu ở mảng born_between thứ i
            $to=$born_between[$i]->to;      //lấy ngày sinh kết thúc ở mảng born_between  thứ i
            $fromto[$i]=$from." to ".$to ;  //nối 2 mảng lại
            
        }
 
        $list=array_combine($fromto,$grades); //lấy tất cả lớp học
        

        
        return view('frontEnd.home.admissions',compact('notes','early','primary','middle','bus','discount','late_enrolment','withdraw','list','schoolyears')); //gửi danh sách vè view 
    }
    /* Phạm Trọng hải   */
    /* Phạm Trọng hải   */
    public function careers()
    {

        try{
            $careers = SmCareers::all();
            return view('frontEnd.careers', compact('careers'));
        }catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back(); 
        }
    }

    public function viewcareer($id)
    {
        try{
            $career = SmCareers::find($id);
            return view('frontEnd.view_career', compact('career'));
        }catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back(); 
        }
    }
    public function job_apply(Request $request)
    {
            request()->validate([

            'cv' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'name' => 'required|max:100|min:1',
            'email' => 'required|max:100|min:1',
            'phone' => 'required|max:11|min:1',
            'sex' => 'required',

            ]);
        try{
            $data['name'] = $request->name;
            $data['sex'] = $request->sex;
            $data['email'] = $request->email;
            $data['phone'] = $request->phone;         
            $data['message'] = $request->message;            
            $file=$request->cv;
            $data['cv']=$file->getClientOriginalName();
            $file->move(base_path('\public\tmp_image'),$data['cv']);// đưa ảnh vào folder lưu tạm 
            Mail::send('frontEnd.job_apply_details', compact('data'), function ($message) use ($request) {

                $setting = SmGeneralSettings::find(1);
                $email = $setting->email;
                $school_name = $setting->school_name;
                $message->from('haiprobaby1998@gmail.com', $school_name);
                $message->to('haiprobaby1998@gmail.com', $school_name)->subject('Job Application');
                
            });

            $image_path = base_path("/public/tmp_image/".$data['cv']);  //Đường dẫn lưu tạm 
            if(File::exists($image_path)) 
            { 
                File::delete($image_path);   ///Xóa ảnh từ folder tạm sau khi dùng xong
            }

            return redirect()->back()->with('notification','Your Application has been stored successfully');

        }catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back(); 
        }
    }
    public function getlistsubcate($id)
    {
        try{
            $list_sub_cate = SmNewsSubCategory::where('category_id',$id)->get();

            foreach ($list_sub_cate as $list) {
                echo "<option data-display='".$list->sub_category_name."' value='".$list->id."'>".$list->sub_category_name."</option>";
            }
        }catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back(); 
        }
    }

    public function getcategory($id)
    {
        try{
            $list_cate = SmNewsSubCategory::find($id);
            $id_cate = $list_cate->category_id;
            return $id_cate;
            
        }catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back(); 
        }
    }
    /*Phạm Trọng Hải end  28/7/2020*/
}
