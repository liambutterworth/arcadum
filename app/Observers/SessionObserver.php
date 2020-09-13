<?php

namespace App\Observers;

use App\Models\Session;

class SessionObserver
{
    public function creating(Session $session)
    {
        $session->index = $session->campaign->session_count;
    }

    public function deleted(Session $session)
    {
        $session->campaign->reorderSessions();
    }
}
