<?php
 
namespace App\Observers;
 
use App\Models\Lesson;
 
class LessonObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the Lesson "created" event.
     */
    public function created(Lesson $lesson): void
    {
        // ...
    }
 
    /**
     * Handle the Lesson "updated" event.
     */
    public function updated(Lesson $lesson): void
    {
        // ...
    }
 
    /**
     * Handle the Lesson "deleted" event.
     */
    public function deleted(Lesson $lesson): void
    {
        // ...
    }
 
    /**
     * Handle the Lesson "restored" event.
     */
    public function restored(Lesson $lesson): void
    {
        // ...
    }
 
    /**
     * Handle the Lesson "forceDeleted" event.
     */
    public function forceDeleted(Lesson $lesson): void
    {
        // ...
    }
}