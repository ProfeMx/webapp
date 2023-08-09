<?php
 
namespace App\Observers;
 
use App\Models\Submission;
 
class SubmissionObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the Submission "created" event.
     */
    public function created(Submission $submission): void
    {
        // ...
    }
 
    /**
     * Handle the Submission "updated" event.
     */
    public function updated(Submission $submission): void
    {
        // ...
    }
 
    /**
     * Handle the Submission "deleted" event.
     */
    public function deleted(Submission $submission): void
    {
        // ...
    }
 
    /**
     * Handle the Submission "restored" event.
     */
    public function restored(Submission $submission): void
    {
        // ...
    }
 
    /**
     * Handle the Submission "forceDeleted" event.
     */
    public function forceDeleted(Submission $submission): void
    {
        // ...
    }
}