<?php
namespace App\Tests\Behat;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use PHPUnit\Framework\Assert as Assertions;
use App\Entity\ReviewConstruction\ReviewConstructionItemType;
use App\Entity\ReviewConstruction\ReviewConstructionItem;

/**
 * Defines application features from the specific context.
 */
class ReviewConstructionContext implements Context
{

    private $reviewConstructionItemType;

    /**
     * @When I add review Construction Item Type with name  :arg1
     */
    public function iAddReviewConstructionItemTypeWithName($arg1)
    {
        $reviewConstructionItemType= new ReviewConstructionItemType();
        $reviewConstructionItemType->setName($arg1);
        $this->reviewConstructionItemType = $reviewConstructionItemType;
        Assertions::assertNotNull($reviewConstructionItemType);
    }


    /**
     * @When I add review Construction Item with title :arg1 and page :arg2
     */
    public function iAddReviewConstructionItemWithTitleAndPage($arg1,$arg2)
    {
        $reviewConstructionItem = new ReviewConstructionItem();
        $reviewConstructionItem->setTitle($arg1);
        $reviewConstructionItem->setPage($arg2);
        $this->reviewConstructionItemType->addReviewConstructionItem($reviewConstructionItem);
        Assertions::assertNotNull($reviewConstructionItem);
    }

    /**
     * @Then The results should include a review Construction item Type with item count :arg1
     */
    public function theResultsShouldIncludeAArticleWithCommentCount($arg1)
    {
        $reviewConstructionItems=$this->reviewConstructionItemType->getReviewConstructionItems();
        Assertions::assertEquals(1,count($reviewConstructionItems));
    }


}
