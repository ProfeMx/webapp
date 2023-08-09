<?php
 
namespace App\Observers;
 
use App\Models\ThreadReply;
 
class ThreadReplyObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the ThreadReply "created" event.
     */
    public function created(ThreadReply $threadReply): void
    {
        // ...
    }
 
    /**
     * Handle the ThreadReply "updated" event.
     */
    public function updated(ThreadReply $threadReply): void
    {
        // ...
    }
 
    /**
     * Handle the ThreadReply "deleted" event.
     */
    public function deleted(ThreadReply $threadReply): void
    {
        // ...
    }
 
    /**
     * Handle the ThreadReply "restored" event.
     */
    public function restored(ThreadReply $threadReply): void
    {
        // ...
    }
 
    /**
     * Handle the ThreadReply "forceDeleted" event.
     */
    public function forceDeleted(ThreadReply $threadReply): void
    {
        // ...
    }
}