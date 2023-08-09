<?php
 
namespace App\Observers;
 
use App\Models\User;
 
class UserObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        // ...
    }
 
    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        // ...
    }
 
    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        // ...
    }
 
    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        // ...
    }
 
    /**
     * Handle the User "forceDeleted" event.
     */
    public function forceDeleted(User $user): void
    {
        // ...
    }
}