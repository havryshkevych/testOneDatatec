<?php

namespace Tests\Unit;

use App\Events\SubmissionSaved;
use App\Listeners\LogSubmissionSaved;
use App\Models\Submission;
use Illuminate\Support\Facades\Log;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class LogSubmissionSavedListenerTest extends TestCase
{
    #[Test]
    public function it_logs_submission_saved_event()
    {
        Log::shouldReceive('info')
            ->once()
            ->with('Submission saved: John Doe (john.doe@example.com)');

        $submission = new Submission([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'message' => 'This is a test message.'
        ]);

        $event = new SubmissionSaved($submission);

        $listener = new LogSubmissionSaved();
        $listener->handle($event);
    }
}
