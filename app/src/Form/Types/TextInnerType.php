<?php

namespace App\Form\Types;


use App\Form\Types\Interfaces\InnerTypeInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * Class TextInnerType
 */
class TextInnerType implements InnerTypeInterface
{
    /**
     * Run the TextInnerType options
     */
    public static function fetch():array
    {

        $row['type']=TextType::class;
        $row['options']=['required'   => true];
        return $row;

    }
}