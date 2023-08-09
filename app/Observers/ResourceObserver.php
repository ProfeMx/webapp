<?php
 
namespace App\Observers;
 
use App\Models\Resource;
 
class ResourceObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the Resource "created" event.
     */
    public function created(Resource $resource): void
    {
        // ...
    }
 
    /**
     * Handle the Resource "updated" event.
     */
    public function updated(Resource $resource): void
    {
        // ...
    }
 
    /**
     * Handle the Resource "deleted" event.
     */
    public function deleted(Resource $resource): void
    {
        // ...
    }
 
    /**
     * Handle the Resource "restored" event.
     */
    public function restored(Resource $resource): void
    {
        // ...
    }
 
    /**
     * Handle the Resource "forceDeleted" event.
     */
    public function forceDeleted(Resource $resource): void
    {
        // ...
    }
}