<?php
 
namespace App\Observers;
 
use App\Models\Attempt;
 
class AttemptObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the Attempt "created" event.
     */
    public function created(Attempt $attempt): void
    {
        // ...
    }
 
    /**
     * Handle the Attempt "updated" event.
     */
    public function updated(Attempt $attempt): void
    {
        // ...
    }
 
    /**
     * Handle the Attempt "deleted" event.
     */
    public function deleted(Attempt $attempt): void
    {
        // ...
    }
 
    /**
     * Handle the Attempt "restored" event.
     */
    public function restored(Attempt $attempt): void
    {
        // ...
    }
 
    /**
     * Handle the Attempt "forceDeleted" event.
     */
    public function forceDeleted(Attempt $attempt): void
    {
        // ...
    }
}