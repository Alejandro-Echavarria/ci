<?php

namespace App\Http\Livewire\Admin;

use App\Models\Grade;
use App\Models\Quater;
use Livewire\Component;
use Illuminate\Support\Str;

class GradesSelect extends Component
{
    public $subjects = [];
    public $grades = [];
    public $credits = [];
    public $name;
    public $gradePoint;

    // Validations rules
    protected $rules = [
        'name'       => 'required|min:1|max:60',
        'subjects.*' => 'required|integer',
        'credits.*'  => 'required|integer|between:0,6'
    ];

    protected $validationAttributes  = [
        'subjects.*' => 'materia',
        'credits.*' => 'crédito'
    ];

    public function mount()
    {
        $this->grades = Grade::all()->where('status', 1);
        $this->subjects = [
            [],
        ];
        $this->credits = [
            [],
        ];
    }

    public function addSubject()
    {
        if (count($this->subjects) < 15) {
            
            $this->subjects[] = [];
            $this->credits[] = [];
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
        $this->gradePoint();
        return view('livewire.admin.grades-select');
    }

    public function save()
    {
        $this->validate();
        
        $totalQuaters = Quater::where('user_id', auth()->user()->id)->get();
           
        if (count($totalQuaters) <= 15) {
            
            
            $slug = Str::slug($this->name);
    
            $quater = Quater::create(['name' => $this->name, 
                                      'slug' => $slug]);
    
            foreach ($this->subjects as $key => $subject) {
                    
                $quater->subjects()->create(['credits' => $this->credits[$key], 'grade_id' => $subject]);
            }
    
            return redirect()->route('admin.quaters.index')->with('info', 'El cuatrimestre ('. $quater->name .') se creó con éxito.');
        }else{
            session()->flash('info', 'El número máximo de cuatrimestres permitidos son 15');
        }

    }

    public function gradePoint()
    {
        foreach ($this->subjects as $key => $subject) {
            
            $this->gradePoint = $this->subjects;
        }
    }
}
