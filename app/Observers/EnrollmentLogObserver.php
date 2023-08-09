<?php
 
namespace App\Observers;
 
use App\Models\EnrollmentLog;
 
class EnrollmentLogObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the EnrollmentLog "created" event.
     */
    public function created(EnrollmentLog $enrollmentLog): void
    {
        // ...
    }
 
    /**
     * Handle the EnrollmentLog "updated" event.
     */
    public function updated(EnrollmentLog $enrollmentLog): void
    {
        // ...
    }
 
    /**
     * Handle the EnrollmentLog "deleted" event.
     */
    public function deleted(EnrollmentLog $enrollmentLog): void
    {
        // ...
    }
 
    /**
     * Handle the EnrollmentLog "restored" event.
     */
    public function restored(EnrollmentLog $enrollmentLog): void
    {
        // ...
    }
 
    /**
     * Handle the EnrollmentLog "forceDeleted" event.
     */
    public function forceDeleted(EnrollmentLog $enrollmentLog): void
    {
        // ...
    }
}