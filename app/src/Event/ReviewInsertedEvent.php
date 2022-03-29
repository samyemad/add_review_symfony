<?php
namespace App\Event;

use Symfony\Contracts\EventDispatcher\Event;
use App\Entity\Review\Review;

class ReviewInsertedEvent extends Event
{
    public const NAME = 'app.review.inserted';

    protected $review;

    public function __construct(Review $review)
    {
        $this->review = $review;
    }

    public function getReview(): Review
    {
        return $this->review;
    }
}

