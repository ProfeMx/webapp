<?php
 
namespace App\Observers;
 
use App\Models\Homework;
 
class HomeworkObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the Homework "created" event.
     */
    public function created(Homework $homework): void
    {
        // ...
    }
 
    /**
     * Handle the Homework "updated" event.
     */
    public function updated(Homework $homework): void
    {
        // ...
    }
 
    /**
     * Handle the Homework "deleted" event.
     */
    public function deleted(Homework $homework): void
    {
        // ...
    }
 
    /**
     * Handle the Homework "restored" event.
     */
    public function restored(Homework $homework): void
    {
        // ...
    }
 
    /**
     * Handle the Homework "forceDeleted" event.
     */
    public function forceDeleted(Homework $homework): void
    {
        // ...
    }
}