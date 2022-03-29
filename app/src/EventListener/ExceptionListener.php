<?php
namespace App\EventListener;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpFoundation\JsonResponse;
class ExceptionListener {
    public function onKernelException(ExceptionEvent $event) : void
    {
//        if (
//        stristr($event->getRequest()->getPathInfo(), 'user') && (
//             !$event->isMasterRequest()
//            || !$event->getThrowable() instanceof NotFoundHttpException)
//        )
//        {
//           if(method_exists($event->getThrowable(),'getCode') && $event->getThrowable()->getCode() != 0)
//           {
//               $code= $event->getThrowable()->getCode();
//           }
//           else
//           {
//               $code= $event->getThrowable()->getStatusCode();
//           }
//            $response['message']=$event->getThrowable()->getMessage();
//            $response['code']=$code;
//            $event->setResponse(new JsonResponse($response,$code));
//            return;
//        }
//        $event->setResponse(new JsonResponse('Some Error Found we fix now this error please keep calm',404));
    }
}
