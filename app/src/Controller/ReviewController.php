<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\ProcessorActions\Manager\ProcessorActionManagerInterface;
use App\Service\Interfaces\HandlerCollectionInterface;
use App\Entity\Review\Review;
use App\Form\ReviewType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use App\Service\Interfaces\GenerateEventInterface;
use App\Event\ReviewInsertedEvent;
use Symfony\Component\HttpFoundation\Response;
use App\Service\Errors\RetrieveErrors;
class ReviewController extends AbstractController
{
    /**
     * add Review with Project and Client and the items of the review
     * @param HandlerCollectionInterface $handlerCollection
     * @param ProcessorActionManagerInterface $processorActionManager
     * @param Request $request
     * @param GenerateEventInterface $generateEvent
     * @param EventDispatcherInterface $eventDispatcher
     * @return Response $response
     * @Route("/api/account/addreview", name="account_add_review", methods={"POST"})
     */
    public function addReview(HandlerCollectionInterface $handlerCollection,ProcessorActionManagerInterface $processorActionManager,Request $request,GenerateEventInterface $generateEvent,EventDispatcherInterface $eventDispatcher):Response
    {
        $review = new Review();
        $form=$this->createForm(ReviewType::class,$review);
        $data=json_decode($request->getContent(),true);
        $form->submit($data);

        if($form->isSubmitted()&&$form->isValid())
        {
            $generateEvent->generate(ReviewInsertedEvent::class,$review,$eventDispatcher);
        }
        else
        {
            $errors=RetrieveErrors::show($form->getErrors(true, true));
            return $this->json($errors,400);
        }
        $constructionReviews=$processorActionManager->create('view_reviews');
        $content= $constructionReviews->run($review,$handlerCollection);
        return $this->json(['message' => 'Review Added Successfully','data' => $content]);
    }



}