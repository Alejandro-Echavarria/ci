<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Grade;
use Livewire\WithPagination;

class GradeIndex extends Component
{
    use WithPagination;
    
    public $search;
    public $page = 1;
    // protected $paginationTheme = 'bootstrap';
    protected $queryString = [
        'search' => ['except' => '', 'as' => 'q'],
        'page' => ['except' => 1, 'as' => 'p'],
    ];

    public function updatingSearch(){

        $this->resetPage();
    }

    public function render()
    {
        $grades = Grade::where('id', 'LIKE', '%'. $this->search . '%')
                       ->orWhere('name', 'LIKE', '%'. $this->search . '%')
                       ->orWhere('value', 'LIKE', '%'. $this->search . '%')
                       ->orWhere('status', 'LIKE', '%'. $this->search . '%')
                       ->orWhere('created_at', 'LIKE', '%'. $this->search . '%')
                       ->orWhere('updated_at', 'LIKE', '%'. $this->search . '%')
                       ->paginate(10);

        return view('livewire.admin.grade-index', compact('grades'));
    }
}
