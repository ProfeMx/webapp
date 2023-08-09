<?php
 
namespace App\Observers;
 
use App\Models\Note;
 
class NoteObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the Note "created" event.
     */
    public function created(Note $note): void
    {
        // ...
    }
 
    /**
     * Handle the Note "updated" event.
     */
    public function updated(Note $note): void
    {
        // ...
    }
 
    /**
     * Handle the Note "deleted" event.
     */
    public function deleted(Note $note): void
    {
        // ...
    }
 
    /**
     * Handle the Note "restored" event.
     */
    public function restored(Note $note): void
    {
        // ...
    }
 
    /**
     * Handle the Note "forceDeleted" event.
     */
    public function forceDeleted(Note $note): void
    {
        // ...
    }
}