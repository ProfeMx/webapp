<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        $this->registerModelEvents();
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }

    private function registerModelEvents()
    {
        
        $basePath = realpath(__DIR__ . '/../Http/Events');

        $namespace = 'App\Http\Events\\';

        $models = glob("{$basePath}/*", GLOB_ONLYDIR);

        foreach ($models as $modelPath) {
        
            $model = basename($modelPath);
        
            $events = glob("{$modelPath}/Events/*.php", GLOB_BRACE);

            foreach ($events as $eventPath) {
        
                $eventName = pathinfo($eventPath, PATHINFO_FILENAME);
        
                $listeners = glob("{$modelPath}/Listeners/{$eventName}/*.php", GLOB_BRACE);

                foreach ($listeners as $listenerPath) {
        
                    $listenerName = pathinfo($listenerPath, PATHINFO_FILENAME);
        
                    $event = "{$namespace}{$model}\\Events\\{$eventName}";
        
                    $listener = "{$namespace}{$model}\\Listeners\\{$eventName}\\{$listenerName}";

                    Event::listen($event, $listener);

                }

            }

        }

    }

}
