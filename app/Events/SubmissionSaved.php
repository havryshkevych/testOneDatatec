<?php

declare(strict_types=1);

namespace App\Events;

use App\Models\Submission;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SubmissionSaved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Submission $submission;

    public function __construct(Submission $submission)
    {
        $this->submission = $submission;
    }
}
