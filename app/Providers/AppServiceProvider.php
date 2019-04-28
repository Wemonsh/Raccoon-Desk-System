<?php

namespace App\Providers;

use App\SocialMessages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        DB::listen(function ($query) {
//            dump($query->sql);
//            dump($query->bindings);
//        });



        // Метод передачи количества непрочитанных сообщений в layout.blade
        view()->composer('layouts.default', function($view)
        {
            if (Auth::check()) {
                $messages_new = SocialMessages::where('id_receiver', '=', Auth::user()->id)->where('unread', '=', 0)->count();

                $view->with('messages_new', $messages_new);

//               view()->share('messages_new ', $messages_new);
            }
            else {
                $messages_new = 0;

                $view->with('messages_new', $messages_new);

//              view()->share('messages_new ', $messages_new);
            }

        });
    }
}
