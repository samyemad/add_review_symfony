<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use App\Entity\ReviewConstruction\ReviewConstructionItemType;
use App\Entity\ReviewConstruction\ReviewConstructionItem;

class ReviewConstructionFixture extends Fixture implements FixtureGroupInterface
{
    /**
     *
     * load ReviewConstruction Fixture and Insert It to Our system
     * @param ObjectManager $manager
     *
     */
    public function load(ObjectManager $manager)
    {
        $dateTime = new \DateTime('NOW');
        /* add reviewConstructionItemTypeText item  */
        $reviewConstructionItemTypeText = new ReviewConstructionItemType();
        $reviewConstructionItemTypeText->setName('text');
        $reviewConstructionItemTypeText->setCreated($dateTime);
        /* add reviewConstructionItem based on text type item  */
        $reviewConstructionItem= new ReviewConstructionItem();
        $reviewConstructionItem->setTitle('please Add  short Review');
        $reviewConstructionItem->setCreated($dateTime);
        $reviewConstructionItem->setPage(1);
        $reviewConstructionItemTypeText->addReviewConstructionItem($reviewConstructionItem);
        /* add reviewConstructionItemTypeChoice item  */
        $reviewConstructionItemTypeChoice = new ReviewConstructionItemType();
        $reviewConstructionItemTypeChoice->setName('choice');
        $reviewConstructionItemTypeChoice->setCreated($dateTime);
        /* add reviewConstructionItem based on choice type item  */
        $reviewConstructionItem= new ReviewConstructionItem();
        $reviewConstructionItem->setTitle('Overall Satisfaction');
        $reviewConstructionItem->setCreated($dateTime);
        $reviewConstructionItem->setPage(1);
        $reviewConstructionItemTypeChoice->addReviewConstructionItem($reviewConstructionItem);
        /* add reviewConstructionItem based on choice type item  */
        $reviewConstructionItem= new ReviewConstructionItem();
        $reviewConstructionItem->setTitle('Communications');
        $reviewConstructionItem->setCreated($dateTime);
        $reviewConstructionItem->setPage(2);
        $reviewConstructionItemTypeChoice->addReviewConstructionItem($reviewConstructionItem);
        /* add reviewConstructionItem based on choice type item  */
        $reviewConstructionItem= new ReviewConstructionItem();
        $reviewConstructionItem->setTitle('Quality Of Work');
        $reviewConstructionItem->setCreated($dateTime);
        $reviewConstructionItem->setPage(2);
        $reviewConstructionItemTypeChoice->addReviewConstructionItem($reviewConstructionItem);
        /* add reviewConstructionItem based on choice type item  */
        $reviewConstructionItem= new ReviewConstructionItem();
        $reviewConstructionItem->setTitle('Value For Money');
        $reviewConstructionItem->setCreated($dateTime);
        $reviewConstructionItem->setPage(2);
        $reviewConstructionItemTypeChoice->addReviewConstructionItem($reviewConstructionItem);

        $manager->persist($reviewConstructionItemTypeText);
        $manager->persist($reviewConstructionItemTypeChoice);
        $manager->flush();

    }
    public static function getGroups(): array
    {
        return ['projects'];
    }
}
