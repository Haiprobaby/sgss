<?php 
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Builder;
Use App\SmNewsSubCategory;
Use App\SmNewsCategory;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
   public function boot()
    {
        Builder::defaultStringLength(191);
        view()->composer('frontEnd.home.layout.front_master',function($view){
            $categories = SmNewsCategory::where('category_name', "School Life")->first();
            $view->with('subCategories', []);
            if($categories){
                $view->with('subCategories', SmNewsSubCategory::where('category_id', $categories->id)->get());
            }
            $categories = SmNewsCategory::all();
            $bulletin = SmNewsSubCategory::where('category_id','16')->get();
            $view->with('categories',$categories,'bulletin',$bulletin);
            $view->with('bulletin',$bulletin);
        });
    }

    public function register()
    {
        //
    }
}
