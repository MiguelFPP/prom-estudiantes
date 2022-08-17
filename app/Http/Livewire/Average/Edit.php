<?php

namespace App\Http\Livewire\Average;

use App\Models\Average;
use App\Models\Student;
use Livewire\Component;

class Edit extends Component
{
    public $average;
    public $student;
    public $students;
    public $partial1;
    public $partial2;
    public $partial3;
    public $final;

    public $exist;

    public $average_id;

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

    public function mount(Average $average)
    {
        $this->average = $average;
        $this->student = $average->student_id;
        $this->partial1 = $average->partial1;
        $this->partial2 = $average->partial2;
        $this->partial3 = $average->partial3;
        $this->final = $average->final;
        $this->students = Student::select('id', 'identification', 'name', 'surname')->get();
        $this->average_id = $average->id;
    }

    public function update()
    {
        $this->validate();
        $this->final = ($this->partial1 + $this->partial2 + $this->partial3) / 3;

        $this->exist = Average::where('student_id', $this->student)->first();
        $average = Average::find($this->average_id);

        if ($average->id !== $this->exist->id) {
            return redirect()->back()->with('error', 'El estudiante ya cuenta con un promedio registrado');
        }

        $average->update([
            'partial1' => $this->partial1,
            'partial2' => $this->partial2,
            'partial3' => $this->partial3,
            'final' => $this->final,
        ]);
        return redirect()->route('averages.index')->with('success', 'Promedio actualizado con éxito');
    }

    public function calculateFinal()
    {
        $average = ($this->partial1 + $this->partial2 + $this->partial3) / 3;
        $this->final = round($average, 1);
    }

    public function render()
    {
        return view('livewire.average.edit');
    }
}
