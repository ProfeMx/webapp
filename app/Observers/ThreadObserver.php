<?php
 
namespace App\Observers;
 
use App\Models\Thread;
 
class ThreadObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the Thread "created" event.
     */
    public function created(Thread $thread): void
    {
        // ...
    }
 
    /**
     * Handle the Thread "updated" event.
     */
    public function updated(Thread $thread): void
    {
        // ...
    }
 
    /**
     * Handle the Thread "deleted" event.
     */
    public function deleted(Thread $thread): void
    {
        // ...
    }
 
    /**
     * Handle the Thread "restored" event.
     */
    public function restored(Thread $thread): void
    {
        // ...
    }
 
    /**
     * Handle the Thread "forceDeleted" event.
     */
    public function forceDeleted(Thread $thread): void
    {
        // ...
    }
}