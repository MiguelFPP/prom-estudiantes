<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use Livewire\Component;

class Index extends Component
{

    protected $listeners = [
        'delete' => 'delete',
    ];

    public function delete(int $id)
    {
        Student::find($id)->delete();
    }

    public function render()
    {
        $students = Student::select('id', 'identification', 'name', 'surname')
            ->orderBy('id', 'desc')
            ->get();
        return view('livewire.student.index', compact('students'));
    }
}
