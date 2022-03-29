<?php
namespace App\EventListener;

use App\Entity\Review\Review;
use App\Event\ReviewInsertedEvent;
use Doctrine\ORM\EntityManagerInterface;


class ReviewInsertedNotifier
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
     $this->em = $em;
    }
    public function notify(ReviewInsertedEvent $event): void
    {
       $review=$event->getReview();
       $this->em->persist($review);
       $this->em->flush();
    }
}

