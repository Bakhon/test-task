<?php

namespace App\Factories;

use App\Factories\DatabaseFeedbackFactory;
use App\Factories\FileFeedbackFactory;
use App\Factories\FeedbackFactoryInterface;
use App\Models\Feedback;

class CompositeFeedbackFactory implements FeedbackFactoryInterface
{
    protected $databaseFactory;
    protected $fileFactory;

    public function __construct(DatabaseFeedbackFactory $databaseFactory, FileFeedbackFactory $fileFactory)
    {
        $this->databaseFactory = $databaseFactory;
        $this->fileFactory = $fileFactory;
    }

    public function create(array $data) : Feedback
    {
        $this->databaseFactory->create($data);
        $this->fileFactory->create($data);

        return new Feedback();
    }
}
