<?php

namespace App\Observers;

use App\Models\Quater;

class QuaterObserver
{
    public function creating(Quater $quater)
    {
        if (! \App::runningInConsole()) {
            
            $quater->user_id = auth()->user()->id;
        }
    }
}
