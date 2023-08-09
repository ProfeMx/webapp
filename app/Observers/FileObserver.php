<?php
 
namespace App\Observers;
 
use App\Models\File;
 
class FileObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the File "created" event.
     */
    public function created(File $file): void
    {
        // ...
    }
 
    /**
     * Handle the File "updated" event.
     */
    public function updated(File $file): void
    {
        // ...
    }
 
    /**
     * Handle the File "deleted" event.
     */
    public function deleted(File $file): void
    {
        // ...
    }
 
    /**
     * Handle the File "restored" event.
     */
    public function restored(File $file): void
    {
        // ...
    }
 
    /**
     * Handle the File "forceDeleted" event.
     */
    public function forceDeleted(File $file): void
    {
        // ...
    }
}