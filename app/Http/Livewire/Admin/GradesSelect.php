<?php

namespace App\Http\Livewire\Admin;

use App\Models\Grade;
use Livewire\Component;

class GradesSelect extends Component
{
    public $subjects = [
        [],
    ];
    public $grades = [];

    public function mount()
    {
        $this->subjects = [
            [],
        ];
        $this->grades = Grade::where('status', 1)->get();
    }

    public function addSubject()
    {
        $this->subjects[] = [];
    }

    public function removeSubject($key)
    {
        unset($this->subjects[$key]);
        array_values($this->subjects);
    }

    public function render()
    {
        return view('livewire.admin.grades-select');
    }
}
