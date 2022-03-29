<?php

namespace App\Form\Types;


use App\Form\Types\Interfaces\InnerTypeInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

/**
 * Class ChoiceInnerType
 */
class ChoiceInnerType implements InnerTypeInterface
{
    /**
     * Run the TextInnerType options
     */
    public static function fetch():array
    {
        $row['type']=ChoiceType::class;
        $row['options']['required']= true;
        $row['options']['choices']= [1,2,3,4,5];
        return $row;

    }
}