<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use Livewire\Component;

class Create extends Component
{
    public $identification;
    public $name;
    public $surname;

    protected $rules=[
        'identification' => 'required|numeric|unique:students,identification',
        'name' => 'required|max:255|regex:/^[\pL\s\-]+$/u',
        'surname' => 'required|max:255|regex:/^[\pL\s\-]+$/u',
    ];

    protected $validationAttributes=[
        'identification' => 'Identificación',
        'name' => 'Nombre',
        'surname' => 'Apellido',
    ];

    public function store(){
        $this->validate();
        Student::create([
            'identification' => $this->identification,
            'name' => $this->name,
            'surname' => $this->surname,
        ]);

        return redirect()->route('students.index')->with('success', 'Estudiante creado con éxito');
    }

    public function render()
    {
        return view('livewire.student.create');
    }
}
