<?php

namespace Modules\Schedule\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

use Illuminate\Routing\Router;

class ScheduleServiceProvider extends ServiceProvider {
  protected $moduleName = "Schedule";

  protected $moduleNameLower = "schedule";

  public function boot(Router $router) {
    $this->registerTranslations();
    $this->registerConfig();
    $this->registerViews();
    $this->registerFactories();
    $this->loadMigrationsFrom(module_path($this->moduleName, "Database/Migrations"));

    // middleware
    $router->aliasMiddleware("XSS", \Modules\Schedule\Http\Middleware\XSS::class);
    $router->aliasMiddleware("CheckDashboardMiddleware", \Modules\Schedule\Http\Middleware\CheckDashboardMiddleware::class);
  }

  public function register() {
    $this->app->register(RouteServiceProvider::class);
  }

  protected function registerConfig() {
    $this->publishes([
      module_path($this->moduleName, "Config/config.php") => config_path($this->moduleNameLower . ".php"),
    ], "config");
    $this->mergeConfigFrom(
      module_path($this->moduleName, "Config/config.php"), $this->moduleNameLower
    );
  }

  public function registerViews() {
    $viewPath = resource_path("views/modules/" . $this->moduleNameLower);

    $sourcePath = module_path($this->moduleName, "Resources/views");

    $this->publishes([
      $sourcePath => $viewPath
    ], ["views", $this->moduleNameLower . "-module-views"]);

    $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->moduleNameLower);
  }

  public function registerTranslations() {
    $langPath = resource_path("lang/modules/" . $this->moduleNameLower);

    if (is_dir($langPath)) {
      $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
    } else {
      $this->loadTranslationsFrom(module_path($this->moduleName, "Resources/lang"), $this->moduleNameLower);
    }
  }

  public function registerFactories() {
    if (! app()->environment("production") && $this->app->runningInConsole()) {
      app(Factory::class)->load(module_path($this->moduleName, "Database/factories"));
    }
  }

  public function provides() {
    return [];
  }

  private function getPublishableViewPaths(): array {
    $paths = [];
    foreach (\Config::get("view.paths") as $path) {
      if (is_dir($path . "/modules/" . $this->moduleNameLower)) {
        $paths[] = $path . "/modules/" . $this->moduleNameLower;
      }
    }
    return $paths;
  }
}
