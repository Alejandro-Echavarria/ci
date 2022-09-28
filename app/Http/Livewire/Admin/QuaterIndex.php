<?php

namespace App\Http\Livewire\Admin;

use App\Models\Quater;
use Livewire\Component;

class QuaterIndex extends Component
{     
    public $search;
    public $page = 1;
    protected $queryString = [
        'search' => ['except' => '', 'as' => 'q'],
        'page' => ['except' => 1, 'as' => 'p'],
    ];

    public function render()
    {
        $quaters = Quater::with('subjects.grade')
                         ->where('id', 'LIKE', '%'. $this->search . '%')
                         ->orWhere('name', 'LIKE', '%'. $this->search . '%')
                         ->orWhere('slug', 'LIKE', '%'. $this->search . '%')
                         ->orWhere('created_at', 'LIKE', '%'. $this->search . '%')
                         ->orWhere('updated_at', 'LIKE', '%'. $this->search . '%')
                         ->where('user_id', auth()->user()->id)
                         ->get();

        return view('livewire.admin.quater-index', compact('quaters'));
    }
}
