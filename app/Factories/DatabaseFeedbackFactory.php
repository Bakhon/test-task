<?php

namespace App\Factories;

use App\Models\Feedback;

class DatabaseFeedbackFactory implements FeedbackFactoryInterface
{
    public function create(array $data): Feedback
    {
        return Feedback::create($data);
    }
}