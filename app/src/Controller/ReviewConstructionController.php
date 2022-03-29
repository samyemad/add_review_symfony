<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\ProcessorActions\Manager\ProcessorActionManagerInterface;
use App\Service\Interfaces\HandlerCollectionInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class ReviewConstructionController extends AbstractController
{

    /**
     * show all review Construction Items with the parent type
     * @param HandlerCollectionInterface $handlerCollection
     * @param ProcessorActionManagerInterface $processorActionManager
     * @return Response $response
     * @Route("/api/account/construction/reviews", name="account_construction_reviews", methods={"GET"})
     */
    public function showReviews(HandlerCollectionInterface $handlerCollection,ProcessorActionManagerInterface $processorActionManager,EntityManagerInterface $em):Response
    {
        $constructionReviews=$processorActionManager->create('view_construction_reviews');
        $content= $constructionReviews->run($em,$handlerCollection);
        return $this->json(['message' => 'Review Constrtuctions Viewed Successfully','data' => $content]);
    }
}