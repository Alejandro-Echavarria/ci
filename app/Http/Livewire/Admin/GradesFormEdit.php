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
    public $grades = [];
    public $credits = [];
    public $quater;
    public $name;

    // Validations rules
    protected $rules = [
        'name'                => 'required|min:1|max:60',
        'subjects.*.grade_id' => 'required|integer',
        'credits.*.credits'   => 'required|integer|between:0,6'
    ];

    protected $validationAttributes  = [
        'subjects.*.grade_id' => 'materia',
        'credits.*.credits' => 'crédito'
    ];

    public function mount()
    {   
        $this->name = $this->quater['name'];
        $this->grades = Grade::all()->where('status', 1);
        $this->subjects = Subject::where('quater_id', $this->quater['id'])->get()->toArray();
        $this->credits = $this->subjects;
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
        $this->validate();

        $totalQuaters = Quater::where('user_id', auth()->user()->id)->get();
           
        if (count($totalQuaters) <= 15) {
            
            $slug = Str::slug($this->name);

            $quater = $this->quater;

            $quater->update(['name' => $this->name, 
                                      'slug' => $slug]);
    
            foreach ($this->subjects as $key => $subject) {
                
                $quater->subjects()->where('id', $this->subjectsId[$key])->update(['credits' => $this->credits[$key]['credits'], 'grade_id' => $subject['grade_id']]);
                $quater->touch();
            }
            
            return redirect()->route('admin.quaters.edit', $quater)->with('info', 'El cuatrimestre ('. $quater->name .') se actualizó con éxito.');
        }else{
            session()->flash('error', 'El número máximo de cuatrimestres permitidos son 15');
        }

    }
}
