<?php

namespace Tests\Feature;

use App\Models\Average;
use App\Models\Student;
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
        $student = Student::create([
            'identification' => '123456789',
            'name' => 'Test',
            'surname' => 'User',
        ]);
        Livewire::test('average.create')
            ->set([
                'partial1' => '3.0',
                'partial2' => '4.0',
                'partial3' => '4.5',
                'student' => $student->id,
            ])->call('store');

        $this->assertDatabaseHas('averages', [
            'partial1' => '3.0',
            'partial2' => '4.0',
            'partial3' => '4.5',
            'student_id' => $student->id,
        ]);
        $this->assertDatabaseHas('averages', [
            'final' => '3.8',
            'student_id' => $student->id,
        ]);
    }

    public function test_redirect_to_create_average()
    {
        $student = Student::create([
            'identification' => '123456789',
            'name' => 'Test',
            'surname' => 'User',
        ]);
        Livewire::test('average.create')
            ->set([
                'partial1' => '3.0',
                'partial2' => '4.0',
                'partial3' => '4.5',
                'student' => $student->id,
            ])->call('store')
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
        $student = Student::create([
            'identification' => '123456789',
            'name' => 'Test',
            'surname' => 'User',
        ]);
        $average = Average::create([
            'partial1' => '3.0',
            'partial2' => '4.0',
            'partial3' => '4.5',
            'final' => '3.8',
            'student_id' => $student->id,
        ]);
        Livewire::test('average.index')
            ->call('delete', $average->id);
        $this->assertDatabaseMissing('averages', [
            'partial1' => '3.0',
            'partial2' => '4.0',
            'partial3' => '4.5',
            'student_id' => $student->id,
        ]);
    }
}
