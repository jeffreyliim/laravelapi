<?php

namespace App\Exceptions;

use Exception;

class IssueConversationCheck extends Exception
{
    public function render()
    {
        return [
            'error' => "Conversation doesn't exist in this issue"
        ];
    }
}
