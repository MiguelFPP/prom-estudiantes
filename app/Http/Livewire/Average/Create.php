<?php

namespace App\Http\Livewire\Average;

use App\Models\Average;
use App\Models\Student;
use Livewire\Component;

class Create extends Component
{
    public $student;
    public $students;
    public $partial1;
    public $partial2;
    public $partial3;
    public $final;

    protected $rules = [
        'student' => 'required|exists:students,id',
        'partial1' => 'required|numeric|between:1.0,5.0',
        'partial2' => 'required|numeric|between:1.0,5.0',
        'partial3' => 'required|numeric|between:1.0,5.0',
    ];

    protected $validationAttributes = [
        'student' => 'Nombre del estudiante',
        'partial1' => 'Primer parcial',
        'partial2' => 'Segundo parcial',
        'partial3' => 'Tercer parcial',
    ];


    public function mount()
    {
        $this->students = Student::select('id', 'identification', 'name', 'surname')->get();;
    }

    public function store()
    {
        $this->validate();

        $this->final = ($this->partial1 + $this->partial2 + $this->partial3) / 3;

        $first = Average::where('student_id', $this->student)->first();

        if ($first) {
            $first->update([
                'partial1' => $this->partial1,
                'partial2' => $this->partial2,
                'partial3' => $this->partial3,
                'final' => $this->final,
            ]);

            return redirect()->route('average.index')->with('success', 'Promedio actualizado con éxito');
        } else {
            Average::create([
                'partial1' => $this->partial1,
                'partial2' => $this->partial2,
                'partial3' => $this->partial3,
                'final' => $this->final,
                'student_id' => $this->student,
            ]);

            return redirect()->route('averages.index')->with('success', 'Promedio calculado con éxito');
        }
    }

    public function calculateFinal()
    {
        $average = ($this->partial1 + $this->partial2 + $this->partial3) / 3;
        $this->final = round($average, 1);
    }

    public function render()
    {
        return view('livewire.average.create');
    }
}
