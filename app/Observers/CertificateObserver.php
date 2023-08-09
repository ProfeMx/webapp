<?php
 
namespace App\Observers;
 
use App\Models\Certificate;
 
class CertificateObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the Certificate "created" event.
     */
    public function created(Certificate $certificate): void
    {
        // ...
    }
 
    /**
     * Handle the Certificate "updated" event.
     */
    public function updated(Certificate $certificate): void
    {
        // ...
    }
 
    /**
     * Handle the Certificate "deleted" event.
     */
    public function deleted(Certificate $certificate): void
    {
        // ...
    }
 
    /**
     * Handle the Certificate "restored" event.
     */
    public function restored(Certificate $certificate): void
    {
        // ...
    }
 
    /**
     * Handle the Certificate "forceDeleted" event.
     */
    public function forceDeleted(Certificate $certificate): void
    {
        // ...
    }
}