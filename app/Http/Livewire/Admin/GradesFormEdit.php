<?php

namespace App\Http\Livewire\Admin;

use App\Models\Grade;
use App\Models\Quater;
use App\Models\Subject;
use Livewire\Component;
use Illuminate\Support\Str;

class GradesFormEdit extends Component
{
    public $subjects = [[]];
    public $subjectsId;
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
        $this->name = $this->quater['name'];
        $this->grades = Grade::all();
        $this->subjects = Subject::where('quater_id', $this->quater['id'])->get()->toArray();
        $this->subjectsId = Subject::where('quater_id', $this->quater['id'])->pluck('id');
    }

    public function addSubject()
    {
        if (count($this->subjects) < 15) {
            
            $this->subjects[] = Subject::create(['quater_id' => $this->quater['id'], 'grade_id' => 1]);
            $this->mount();
        }else{
            session()->flash('error', 'El número máximo de materias son 15 por período');
        }
    }

    public function removeSubject($key, $id)
    {
        unset($this->subjects[$key]);
        array_values($this->subjects);
        
        $subject = Subject::find($id);
        $subject->delete();
        $this->mount();
    }

    public function render()
    {
        return view('livewire.admin.grades-form-edit');
    }

    public function save()
    {
        $totalQuaters = Quater::all();
           
        if (count($totalQuaters) < 15) {
            
            $this->validate();
            $slug = Str::slug($this->name);

            $quater = $this->quater;

            $quater->update(['name' => $this->name, 
                                      'slug' => $slug]);
    
            foreach ($this->subjects as $key => $subject) {
                
                $quater->subjects()->where('id', $this->subjectsId[$key])->update(['grade_id' => $subject]);
                $quater->touch();
            }
            
            return redirect()->route('admin.quaters.edit', $quater)->with('info', 'El cuatrimestre ('. $quater->name .') se actualizó con éxito.');
        }else{
            session()->flash('error', 'El número máximo de cuatrimestres permitidos son 15');
        }

    }
}
