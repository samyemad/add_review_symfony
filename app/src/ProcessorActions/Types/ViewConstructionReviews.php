<?php

namespace App\ProcessorActions\Types;

use App\ProcessorActions\Annotation\ProcessorAction;
use App\ProcessorActions\Types\ProcessorActionTypeInterface;
use Doctrine\ORM\EntityManager;
use App\Service\Serializer\HandlerCollection;
use App\Entity\ReviewConstruction\ReviewConstructionItem;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class ViewConstructionReviews
 * @ProcessorAction(
 *     name = "view_construction_reviews",
 * )
 */
class ViewConstructionReviews implements ProcessorActionTypeViewInterface
{
    /**
     * Run the ViewConstructionReviews  by searlizer and entityManager parameters
     * @param EntityManager $em
     * @param HandlerCollection $handlerCollection
     */
    public function run(EntityManagerInterface $em,HandlerCollection $handlerCollection): array
    {
        $reviews=$em->getRepository(ReviewConstructionItem::class)->findAll();
        $content= $handlerCollection->serialize($reviews,'view');
        return $content;
    }
}