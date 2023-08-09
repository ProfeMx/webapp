<?php
 
namespace App\Observers;
 
use App\Models\Course;
 
class CourseObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the Course "created" event.
     */
    public function created(Course $course): void
    {
        // ...
    }
 
    /**
     * Handle the Course "updated" event.
     */
    public function updated(Course $course): void
    {
        // ...
    }
 
    /**
     * Handle the Course "deleted" event.
     */
    public function deleted(Course $course): void
    {
        // ...
    }
 
    /**
     * Handle the Course "restored" event.
     */
    public function restored(Course $course): void
    {
        // ...
    }
 
    /**
     * Handle the Course "forceDeleted" event.
     */
    public function forceDeleted(Course $course): void
    {
        // ...
    }
}