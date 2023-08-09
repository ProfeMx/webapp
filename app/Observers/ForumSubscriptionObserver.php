<?php
 
namespace App\Observers;
 
use App\Models\ForumSubscription;
 
class ForumSubscriptionObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the ForumSubscription "created" event.
     */
    public function created(ForumSubscription $forumSubscription): void
    {
        // ...
    }
 
    /**
     * Handle the ForumSubscription "updated" event.
     */
    public function updated(ForumSubscription $forumSubscription): void
    {
        // ...
    }
 
    /**
     * Handle the ForumSubscription "deleted" event.
     */
    public function deleted(ForumSubscription $forumSubscription): void
    {
        // ...
    }
 
    /**
     * Handle the ForumSubscription "restored" event.
     */
    public function restored(ForumSubscription $forumSubscription): void
    {
        // ...
    }
 
    /**
     * Handle the ForumSubscription "forceDeleted" event.
     */
    public function forceDeleted(ForumSubscription $forumSubscription): void
    {
        // ...
    }
}