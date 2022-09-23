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
        $this->subjects = [
            [],
        ];
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
        return view('livewire.admin.grades-select');
    }

    public function save()
    {
        $totalQuaters = Quater::all();
           
        if (count($totalQuaters) < 15) {
            
            $this->validate();
            $slug = Str::slug($this->name);
    
            $quater = Quater::create(['name' => $this->name, 
                                      'slug' => $slug]);
    
            foreach ($this->subjects as $subject) {
                
                $quater->subjects()->create(['grade_id' => $subject]);
            }
    
            return redirect()->route('admin.quaters.edit', $quater)->with('info', 'El cuatrimestre ('. $quater->name .') se creó con éxito.');
        }else{
            session()->flash('info', 'El número máximo de cuatrimestres permitidos son 15');
        }

    }
}
