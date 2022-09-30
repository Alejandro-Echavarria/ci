<?php

namespace App\Http\Livewire\Admin;

use App\Models\College;
use Livewire\Component;
use Livewire\WithPagination;

class CollegeIndex extends Component
{
    use WithPagination;
    
    public $search;
    public $page = 1;
    protected $queryString = [
        'search' => ['except' => '', 'as' => 'q'],
        'page' => ['except' => 1, 'as' => 'p'],
    ];

    public function updatingSearch(){

        $this->resetPage();
    }

    public function render()
    {
        $colleges = College::where('id', 'LIKE', '%'. $this->search . '%')
                         ->orWhere('name', 'LIKE', '%'. $this->search . '%')
                         ->orWhere('slug', 'LIKE', '%'. $this->search . '%')
                         ->orWhere('created_at', 'LIKE', '%'. $this->search . '%')
                         ->orWhere('updated_at', 'LIKE', '%'. $this->search . '%')
                        ->paginate(10);

        return view('livewire.admin.college-index', compact('colleges'));
    }
}
