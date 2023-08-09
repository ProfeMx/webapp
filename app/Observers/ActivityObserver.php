<?php
 
namespace App\Observers;
 
use App\Models\Activity;
 
class ActivityObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the Activity "created" event.
     */
    public function created(Activity $activity): void
    {
        // ...
    }
 
    /**
     * Handle the Activity "updated" event.
     */
    public function updated(Activity $activity): void
    {
        // ...
    }
 
    /**
     * Handle the Activity "deleted" event.
     */
    public function deleted(Activity $activity): void
    {
        // ...
    }
 
    /**
     * Handle the Activity "restored" event.
     */
    public function restored(Activity $activity): void
    {
        // ...
    }
 
    /**
     * Handle the Activity "forceDeleted" event.
     */
    public function forceDeleted(Activity $activity): void
    {
        // ...
    }
}