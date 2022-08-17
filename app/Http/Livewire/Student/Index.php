<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search;

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
            ->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('surname', 'like', '%' . $this->search . '%')
            ->orWhere('identification', 'like', '%' . $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate(5);
        return view('livewire.student.index', compact('students'));
    }
}
