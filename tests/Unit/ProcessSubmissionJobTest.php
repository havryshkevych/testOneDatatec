<?php

namespace Tests\Unit;

use App\Events\SubmissionSaved;
use App\Jobs\ProcessSubmission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ProcessSubmissionJobTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_processes_submission_and_dispatches_event()
    {
        Event::fake();

        $data = [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'message' => 'This is a test message.'
        ];

        $job = new ProcessSubmission($data);
        $job->handle();

        $this->assertDatabaseHas('submissions', [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'message' => 'This is a test message.'
        ]);

        Event::assertDispatched(SubmissionSaved::class, function ($event) use ($data) {
            return $event->submission->name === $data['name']
                && $event->submission->email === $data['email']
                && $event->submission->message === $data['message'];
        });
    }
}
