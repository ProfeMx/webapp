<?php
 
namespace App\Observers;
 
use App\Models\Section;
 
class SectionObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the Section "created" event.
     */
    public function created(Section $section): void
    {
        // ...
    }
 
    /**
     * Handle the Section "updated" event.
     */
    public function updated(Section $section): void
    {
        // ...
    }
 
    /**
     * Handle the Section "deleted" event.
     */
    public function deleted(Section $section): void
    {
        // ...
    }
 
    /**
     * Handle the Section "restored" event.
     */
    public function restored(Section $section): void
    {
        // ...
    }
 
    /**
     * Handle the Section "forceDeleted" event.
     */
    public function forceDeleted(Section $section): void
    {
        // ...
    }
}