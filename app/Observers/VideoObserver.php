<?php
 
namespace App\Observers;
 
use App\Models\Video;
 
class VideoObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the Video "created" event.
     */
    public function created(Video $video): void
    {
        // ...
    }
 
    /**
     * Handle the Video "updated" event.
     */
    public function updated(Video $video): void
    {
        // ...
    }
 
    /**
     * Handle the Video "deleted" event.
     */
    public function deleted(Video $video): void
    {
        // ...
    }
 
    /**
     * Handle the Video "restored" event.
     */
    public function restored(Video $video): void
    {
        // ...
    }
 
    /**
     * Handle the Video "forceDeleted" event.
     */
    public function forceDeleted(Video $video): void
    {
        // ...
    }
}