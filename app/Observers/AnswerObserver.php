<?php
 
namespace App\Observers;
 
use App\Models\Answer;
 
class AnswerObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the Answer "created" event.
     */
    public function created(Answer $answer): void
    {
        // ...
    }
 
    /**
     * Handle the Answer "updated" event.
     */
    public function updated(Answer $answer): void
    {
        // ...
    }
 
    /**
     * Handle the Answer "deleted" event.
     */
    public function deleted(Answer $answer): void
    {
        // ...
    }
 
    /**
     * Handle the Answer "restored" event.
     */
    public function restored(Answer $answer): void
    {
        // ...
    }
 
    /**
     * Handle the Answer "forceDeleted" event.
     */
    public function forceDeleted(Answer $answer): void
    {
        // ...
    }
}