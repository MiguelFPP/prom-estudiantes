<?php

namespace Tests\Feature;

use App\Models\Average;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AverageTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_create_average()
    {
        Livewire::test('average.create')
            ->set([
                'student' => 'miguel',
                'partial1' => '3.0',
                'partial2' => '4.0',
                'partial3' => '4.5',
            ])->call('store');

        $this->assertDatabaseHas('averages', [
            'student' => 'miguel',
            'partial1' => '3.0',
            'partial2' => '4.0',
            'partial3' => '4.5',
        ]);
        $this->assertDatabaseHas('averages', [
            'student' => 'miguel',
            'final' => '3.8',
        ]);
    }

    public function test_redirect_to_create_average()
    {
        Livewire::test('average.create')
            ->set([
                'student' => 'miguel',
                'partial1' => '3.0',
                'partial2' => '4.0',
                'partial3' => '4.5',
            ])
            ->call('store')
            ->assertRedirect('/');
    }

    public function test_required_attributes_averege()
    {
        Livewire::test('average.create')
            ->call('store')
            ->assertHasErrors([
                'student' => 'required',
                'partial1' => 'required',
                'partial2' => 'required',
                'partial3' => 'required',
            ]);
    }

    public function test_delete_average()
    {
        $average = Average::create([
            'student' => 'miguel',
            'partial1' => '3.0',
            'partial2' => '4.0',
            'partial3' => '4.5',
            'final' => '3.8',
        ]);
        Livewire::test('average.index')
            ->call('delete', $average->id);
        $this->assertDatabaseMissing('averages', [
            'student' => 'miguel',
            'partial1' => '3.0',
            'partial2' => '4.0',
            'partial3' => '4.5',
        ]);
    }
}
