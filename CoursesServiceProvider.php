<?php namespace Foostart\Courses;

use Illuminate\Support\ServiceProvider;
use LaravelAcl\Authentication\Classes\Menu\SentryMenuFactory;
use URL,
    Route;
use Illuminate\Http\Request;

class CoursesServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Request $request) {

        //generate context key
//        $this->generateContextKey();

        // load view
        $this->loadViewsFrom(__DIR__ . '/Views', 'package-course');

        // include view composers
        require __DIR__ . "/composers.php";

        // publish config
        $this->publishConfig();

        // publish lang
        $this->publishLang();

        // publish views
        //$this->publishViews();

        // publish assets
        $this->publishAssets();

        // publish migration
        $this->publishMigrations();

        // public seeders
        $this->publishSeeders(__DIR__);

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        include __DIR__ . '/Routes/course.php';
    }

    /**
     * Public config to system
     * @source: vendor/foostart/package-course/config
     * @destination: config/
     */
    protected function publishConfig() {
        $this->publishes([
            __DIR__ . '/config/package-course.php' => config_path('package-course.php'),
                ], 'config');
    }

    /**
     * Public language to system
     * @source: vendor/foostart/package-course/lang
     * @destination: resources/lang
     */
    protected function publishLang() {
        $this->publishes([
            __DIR__ . '/lang' => base_path('resources/lang'),
        ]);
    }

    /**
     * Public view to system
     * @source: vendor/foostart/package-course/Views
     * @destination: resources/views/vendor/package-course
     */
    protected function publishViews() {

        $this->publishes([
            __DIR__ . '/Views' => base_path('resources/views/vendor/package-course'),
        ]);
    }

    protected function publishAssets() {
        $this->publishes([
            __DIR__ . '/public' => public_path('packages/foostart/package-course'),
        ]);
    }

    protected function publishMigrations()
    {

        $this->publishes([
                                 __DIR__ . '/database/migrations' => $this->app->databasePath() . '/migrations',
                         ]);
    }

    /**
     * Publish seeders
     * @source: foostart/package-course/database/seeders
     * @destination: database/seeders
     */
    protected function publishSeeders()
    {
        $this->publishes([
            __DIR__ . '/database/seeders' => $this->app->databasePath() . '/seeders',
        ]);
    }

}
