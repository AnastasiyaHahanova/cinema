<?php

declare(strict_types=1);

namespace App\Listener;

use RuntimeException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class ResponseListener
{
    public function onKernelView(ViewEvent $event): void
    {
        $value = $event->getControllerResult();
        $response = null;

        if (is_array($value)) {
            $response = new JsonResponse(json_encode($value));
        }

        if (is_string($value)) {
            $response = new Response($value);
        }

        if(empty($response)){
            throw new RuntimeException('Unable to create response for object');
        }

        $event->setResponse($response);

    }
}