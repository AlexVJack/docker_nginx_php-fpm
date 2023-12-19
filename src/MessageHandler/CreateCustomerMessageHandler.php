<?php

namespace App\MessageHandler;

use App\Message\CreateCustomerMessage;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class CreateCustomerMessageHandler implements MessageHandlerInterface
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function __invoke(CreateCustomerMessage $message)
    {
        $customerId = $message->getCustomerId();
        $this->logger->info("Processing customer with ID: {$customerId}");
    }
}
