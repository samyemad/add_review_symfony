<?php
namespace App\Service\Errors;

use App\Service\Interfaces\RetrieveErrorsInterface;

class RetrieveErrors implements RetrieveErrorsInterface
{
    /**
     * Run the ReteriveErrors  By Form Class Errors
     * @param mixed $formErrors
     * @return array
     */
    public static function show($formErrors): array
    {
        $errors=[];
        foreach ($formErrors as $error)
        {
            $errors['message'] = $error->getMessage();
            $errors['origin']= $error->getMessageParameters();
        }
        return $errors;
    }
}

