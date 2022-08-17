<?php

namespace App\Http\Livewire\Average;

use App\Models\Average;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'delete' => 'delete',
    ];

    public function delete(int $id)
    {
        Average::find($id)->delete();
    }

    public function render()
    {
        $averages = Average::with('student')
            ->orderBy('id', 'desc')
            ->paginate(5);
        return view('livewire.average.index', compact('averages'));
    }
}
