<?php

namespace App\Providers;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();

        // classes automatic morph_map
        $classPaths = glob(app_path() . '/Models/*.php');
        $classes = [];
        foreach ($classPaths as $classPath) {
            $value = basename($classPath, '.php');
            $key = Str::snake($value);
            $classes[$key] = 'App\Models\\' . $value;
        }
        Relation::morphMap($classes);
    }
}
