<?php

namespace App\Observers;

use App\AppointmentNote;

class NoteObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  \App\AppointmentNote  $note
     * @return void
     */
    public function created(AppointmentNote $note)
    {
        event(new \App\Events\NoteSentEvent($note));
    }

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\AppointmentNote  $note
     * @return void
     */
    public function updated(AppointmentNote $note)
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\AppointmentNote  $note
     * @return void
     */
    public function deleted(AppointmentNote $note)
    {
        //
    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\AppointmentNote  $note
     * @return void
     */
    public function restored(AppointmentNote $note)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\AppointmentNote  $note
     * @return void
     */
    public function forceDeleted(AppointmentNote $note)
    {
        //
    }
}
