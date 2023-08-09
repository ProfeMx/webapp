<?php
 
namespace App\Observers;
 
use App\Models\Forum;
 
class ForumObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the Forum "created" event.
     */
    public function created(Forum $forum): void
    {
        // ...
    }
 
    /**
     * Handle the Forum "updated" event.
     */
    public function updated(Forum $forum): void
    {
        // ...
    }
 
    /**
     * Handle the Forum "deleted" event.
     */
    public function deleted(Forum $forum): void
    {
        // ...
    }
 
    /**
     * Handle the Forum "restored" event.
     */
    public function restored(Forum $forum): void
    {
        // ...
    }
 
    /**
     * Handle the Forum "forceDeleted" event.
     */
    public function forceDeleted(Forum $forum): void
    {
        // ...
    }
}