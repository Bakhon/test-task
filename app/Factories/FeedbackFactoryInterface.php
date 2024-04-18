<?php

namespace App\Factories;

use App\Models\Feedback;

interface FeedbackFactoryInterface
{
    public function create(array $data): Feedback;
}