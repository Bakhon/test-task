<?php

namespace App\Factories;

use App\Models\Feedback;
use Illuminate\Support\Facades\Storage;

class FileFeedbackFactory implements FeedbackFactoryInterface
{
    public function create(array $data): Feedback
    {
        $fileName = 'feedback_' . time() . '.txt';
        $content = "Name: {$data['name']}\nPhone: {$data['phone']}\nMessage: {$data['message']}\n";
        Storage::disk('local')->put($fileName, $content);

        return new Feedback($data);
    }
}