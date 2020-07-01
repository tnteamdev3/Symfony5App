<?php

namespace App\digitcorp\crm\module\user\MessageHandler;

use App\digitcorp\crm\module\user\Message\SendEmailMessage;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class SendEmailMessageHandler implements MessageHandlerInterface
{
    public function __invoke(SendEmailMessage $message)
    {
        // do something with your message
    }
}
