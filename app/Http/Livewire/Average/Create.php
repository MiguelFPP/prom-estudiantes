<?php

namespace App\Http\Livewire\Average;

use App\Models\Average;
use Livewire\Component;

class Create extends Component
{
    public $student;
    public $partial1;
    public $partial2;
    public $partial3;
    public $final;

    protected $rules = [
        'student' => 'required|alpha|max:255',
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

    public function store()
    {
        $this->validate();

        $this->final = ($this->partial1 + $this->partial2 + $this->partial3) / 3;

        $average = new Average();
        $average->student = $this->student;
        $average->partial1 = $this->partial1;
        $average->partial2 = $this->partial2;
        $average->partial3 = $this->partial3;
        $average->final = $this->final;

        $average->save();

        return redirect()->route('averages.index')->with('success', 'Promedio calculado con éxito');
    }

    public function calculateFinal(){
        $average = ($this->partial1 + $this->partial2 + $this->partial3) / 3;
        $this->final=round($average,1);
    }

    public function render()
    {
        return view('livewire.average.create');
    }
}
