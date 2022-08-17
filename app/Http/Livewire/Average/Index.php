<?php

namespace App\Http\Livewire\Average;

use App\Models\Average;
use Livewire\Component;

class Index extends Component
{

    protected $listeners = [
        'delete' => 'delete',
    ];

    public function delete(int $id)
    {
        Average::find($id)->delete();
    }

    public function render()
    {
        $averages=Average::with('student')
        ->orderBy('id', 'desc')
        ->get();
        return view('livewire.average.index', compact('averages'));
    }
}
