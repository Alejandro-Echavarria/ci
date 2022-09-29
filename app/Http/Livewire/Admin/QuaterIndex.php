<?php

namespace App\Http\Livewire\Admin;

use App\Models\Quater;
use Livewire\Component;

class QuaterIndex extends Component
{

    public function render()
    {
        $quaters = Quater::with('subjects.grade')
                         ->where('user_id', auth()->user()->id)
                         ->orderBy('id', 'desc')
                         ->get();

        return view('livewire.admin.quater-index', compact('quaters'));
    }
}
