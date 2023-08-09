<?php
 
namespace App\Observers;
 
use App\Models\Path;
 
class PathObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the Path "created" event.
     */
    public function created(Path $path): void
    {
        // ...
    }
 
    /**
     * Handle the Path "updated" event.
     */
    public function updated(Path $path): void
    {
        // ...
    }
 
    /**
     * Handle the Path "deleted" event.
     */
    public function deleted(Path $path): void
    {
        // ...
    }
 
    /**
     * Handle the Path "restored" event.
     */
    public function restored(Path $path): void
    {
        // ...
    }
 
    /**
     * Handle the Path "forceDeleted" event.
     */
    public function forceDeleted(Path $path): void
    {
        // ...
    }
}