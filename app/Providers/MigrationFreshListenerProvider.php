<?php

namespace App\Providers;

use Event;
use Illuminate\Database\Events\MigrationsStarted;
use Illuminate\Console\Events\CommandStarting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Filesystem\Filesystem;


class MigrationFreshListenerProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Event::listen(MigrationsStarted::class, function (MigrationsStarted $event){
        //     dd('here');
        // });

        Event::listen(CommandStarting::class, function (CommandStarting $event) {
            if ($event->input->hasParameterOption('migrate:fresh'))
            {
                $files = glob(public_path('users/*'));
                
                // Deleting all the files in the list
                foreach($files as $file) {
                    if(is_file($file)) 
                        // Delete the given file
                        unlink($file); 
                }

                $files = glob(public_path('images/*'));
                
                // Deleting all the files in the list
                foreach($files as $file) {
                    if(is_file($file)) 
                        // Delete the given file
                        unlink($file); 
                }
                
            }
        });
    }
}
