<?php

namespace Tests\Feature;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class StudentTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    public function test_create_student()
    {
        Livewire::test('student.create')
            ->set([
                'identification' => '123456789',
                'name' => 'Test',
                'surname' => 'User',
            ])->call('store');

        $this->assertDatabaseHas('students', [
            'identification' => '123456789',
            'name' => 'Test',
            'surname' => 'User',
        ]);
    }

    public function test_redirect_to_create_student()
    {
        Livewire::test('student.create')
            ->set([
                'identification' => '123456789',
                'name' => 'Test',
                'surname' => 'User',
            ])->call('store')
            ->assertRedirect('/students');
    }

    public function test_required_attributes_student()
    {
        Livewire::test('student.create')
            ->call('store')
            ->assertHasErrors(['identification', 'name', 'surname']);
    }

    public function test_delete_student()
    {
        $student = Student::create([
            'identification' => '123456789',
            'name' => 'Test',
            'surname' => 'User',
        ]);
        Livewire::test('student.index')
            ->call('delete', $student->id);
        $this->assertDatabaseMissing('students', [
            'identification' => '123456789',
            'name' => 'Test',
            'surname' => 'User',
        ]);
    }
}
