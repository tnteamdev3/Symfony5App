<?php

namespace App\digitcorp\crm\module\MessageHandler;

use App\digitcorp\crm\module\Message\SendEmailMessage;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class SendEmailMessageHandler implements MessageHandlerInterface
{
    public function __invoke(SendEmailMessage $message)
    {
        // do something with your message
    }
}
