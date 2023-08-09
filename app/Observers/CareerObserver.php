<?php
 
namespace App\Observers;
 
use App\Models\Career;
 
class CareerObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the Career "created" event.
     */
    public function created(Career $career): void
    {
        // ...
    }
 
    /**
     * Handle the Career "updated" event.
     */
    public function updated(Career $career): void
    {
        // ...
    }
 
    /**
     * Handle the Career "deleted" event.
     */
    public function deleted(Career $career): void
    {
        // ...
    }
 
    /**
     * Handle the Career "restored" event.
     */
    public function restored(Career $career): void
    {
        // ...
    }
 
    /**
     * Handle the Career "forceDeleted" event.
     */
    public function forceDeleted(Career $career): void
    {
        // ...
    }
}