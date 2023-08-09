<?php
 
namespace App\Observers;
 
use App\Models\Question;
 
class QuestionObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the Question "created" event.
     */
    public function created(Question $question): void
    {
        // ...
    }
 
    /**
     * Handle the Question "updated" event.
     */
    public function updated(Question $question): void
    {
        // ...
    }
 
    /**
     * Handle the Question "deleted" event.
     */
    public function deleted(Question $question): void
    {
        // ...
    }
 
    /**
     * Handle the Question "restored" event.
     */
    public function restored(Question $question): void
    {
        // ...
    }
 
    /**
     * Handle the Question "forceDeleted" event.
     */
    public function forceDeleted(Question $question): void
    {
        // ...
    }
}