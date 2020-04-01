<?php


namespace App\Modules;


use App\Modules\Payment\ModelObservers\PaymentsObserver;
use App\Modules\Payment\Models\Payment;
use App\Modules\Services\ModelObservers\DisputeMessageObserver;
use App\Modules\Services\ModelObservers\DisputeObserver;
use App\Modules\Services\ModelObservers\OrderObserver;
use App\Modules\Services\Models\Order;
use App\Modules\Services\Models\OrderDispute;
use App\Modules\Services\Models\OrderDisputeMessage;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class ModulesServiceProvider extends ServiceProvider
{

    /**
     * Will make sure that the required modules have been fully loaded
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Blade::directive('isNull', function ($expression) {
            return "<?php try {echo ($expression);} catch(\\Exception \$e) { echo '-';} ?>";

        });
        // For each of the registered modules, include their routes and Views
        $modules = config("module.modules");
       
        if (!$modules) {
            return;
        }
        // Load the routes for each of the modules
        foreach ($modules as $module) {
            $routesFile = ucfirst($module) . 'Routes.php';
//            die($routesFile);
            $routesPath = __DIR__ . '/' . $module . '/' . $routesFile;
            if (file_exists($routesPath)) {
                $controllersNamespace = 'App\Modules\\' . $module . '\\' . 'Controllers';
                Route::group([
                    'middleware' => 'api',
                    'namespace' => $controllersNamespace,
                    'prefix' => 'api'
                ], function ($router) use ($routesPath) {
                    require_once $routesPath;
                });
            }

            // Load the views
            if (is_dir(__DIR__ . '/' . $module . '/Views')) {
                $this->loadViewsFrom(__DIR__ . '/' . $module . '/Views', $module);
            }

            //Load the migrations
            if (is_dir(__DIR__ . '/' . $module . '/Migrations')) {
                $this->loadMigrationsFrom(__DIR__ . '/' . $module . '/Migrations');
            }

            //Load the migrations
            if (is_dir(__DIR__ . '/' . $module . '/Migrations')) {
                $this->loadMigrationsFrom(__DIR__ . '/' . $module . '/Migrations');
            }
        }


    }


}
