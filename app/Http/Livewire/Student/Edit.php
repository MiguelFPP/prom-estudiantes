<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use Livewire\Component;

class Edit extends Component
{
    public $student;
    public $identification;
    public $name;
    public $surname;
    public $student_id;

    public function mount(Student $student)
    {
        $this->identification = $student->identification;
        $this->name = $student->name;
        $this->surname = $student->surname;
        $this->student_id = $student->id;
    }

    public function rules()
    {
        return [
            'identification' => 'required|numeric|unique:students,identification,' . $this->student_id,
            'name' => 'required|max:255|regex:/^[\pL\s\-]+$/u',
            'surname' => 'required|max:255|regex:/^[\pL\s\-]+$/u',
        ];
    }

    protected $validationAttributes = [
        'identification' => 'Identificación',
        'name' => 'Nombre',
        'surname' => 'Apellido',
    ];

    public function update()
    {
        $this->validate();
        $student = Student::find($this->student_id);
        $student->update([
            'identification' => $this->identification,
            'name' => $this->name,
            'surname' => $this->surname,
        ]);

        return redirect()->route('students.index')->with('success', 'Estudiante actualizado con éxito');
    }

    public function render()
    {
        return view('livewire.student.edit');
    }
}
