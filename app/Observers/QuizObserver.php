<?php
 
namespace App\Observers;
 
use App\Models\Quiz;
 
class QuizObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the Quiz "created" event.
     */
    public function created(Quiz $quiz): void
    {
        // ...
    }
 
    /**
     * Handle the Quiz "updated" event.
     */
    public function updated(Quiz $quiz): void
    {
        // ...
    }
 
    /**
     * Handle the Quiz "deleted" event.
     */
    public function deleted(Quiz $quiz): void
    {
        // ...
    }
 
    /**
     * Handle the Quiz "restored" event.
     */
    public function restored(Quiz $quiz): void
    {
        // ...
    }
 
    /**
     * Handle the Quiz "forceDeleted" event.
     */
    public function forceDeleted(Quiz $quiz): void
    {
        // ...
    }
}