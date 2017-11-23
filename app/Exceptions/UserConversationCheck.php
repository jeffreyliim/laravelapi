<?php

namespace App\Exceptions;

use Exception;

class UserConversationCheck extends Exception
{
    public function render()
    {
        return [
            'error' => 'User has not created a conversation for the issue'
        ];
    }
}
