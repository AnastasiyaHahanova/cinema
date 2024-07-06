<?php

declare(strict_types=1);

namespace App\Listener;

use App\Exception\Entity\NotFoundEntityException;
use App\Exception\Form\Type\FormErrorsException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

class ExceptionListener
{
    public function onKernelException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();

        $response = new JsonResponse();
        if ($exception instanceof FormErrorsException) {
            $response->setStatusCode(Response::HTTP_BAD_REQUEST);
            $response->setContent(json_encode(['errors' => $exception->getErrors()]));
        } elseif ($exception instanceof NotFoundEntityException) {
            $response->setStatusCode(Response::HTTP_NOT_FOUND);
            $response->setContent(json_encode(['errors' => $exception->getMessage()]));
        } else {
            throw $exception;
        }

        $event->setResponse($response);
    }
}