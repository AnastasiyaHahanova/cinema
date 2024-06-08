<?php

declare(strict_types=1);

namespace App\Consumer;

use App\Message\Ticket\CreateTicketMessage;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class CreateTicketHandler
{
    public function __invoke(CreateTicketMessage $message)
    {
    }
}