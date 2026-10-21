<?php

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('stores a task when the form is submitted', function () {
    $response = $this->post('/tasks', [
        'task_title' => 'Learn Laravel',
        'description' => 'Finish the task flow',
    ]);

    $response->assertRedirect('/tasks');
    expect(Task::count())->toBe(1)
        ->and(Task::first()->task_title)->toBe('Learn Laravel');
});
