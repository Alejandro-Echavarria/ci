<?php

namespace App\Http\Livewire\Admin;

use App\Models\Grade;
use App\Models\Subject;
use Livewire\Component;

class GradesFormEdit extends Component
{
    public $subjects;
    public $grades;
    public $quater;
    public $name;

    // Validations rules
    protected $rules = [
        'name'       => 'required|min:1|max:60',
        'subjects.*' => 'required|integer'
    ];

    protected $validationAttributes  = [
        'subjects.*' => ''
    ];

    public function mount()
    {
        $this->grades = Grade::all();
        $this->subjects = Subject::where('quater_id', $this->quater['id'])->get()->toArray();
    }

    public function addSubject()
    {
        if (count($this->subjects) < 15) {
            
            $this->subjects[] = [];
        }else{
            session()->flash('info', 'El número máximo de materias son 15 por período');
        }
    }

    public function removeSubject($key)
    {
        unset($this->subjects[$key]);
        array_values($this->subjects);
    }

    public function render()
    {
        return view('livewire.admin.grades-form-edit');
    }
}
