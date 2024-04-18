<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FeedbackRequest;
use App\Factories\FeedbackFactoryInterface;

class FeedBackController extends Controller
{
    protected $factory;

    public function __construct(FeedbackFactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function store(FeedBackRequest $request)
    {
        try {
            $feedback = $this->factory->create($request->all());
    
            return response()->json(['message' => 'Feedback submitted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
