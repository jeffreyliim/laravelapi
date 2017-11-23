<?php

namespace App\Http\Requests;

use App\Issue;
use App\IssueConversations;
use Illuminate\Foundation\Http\FormRequest;

class IssuesConversationsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'conversation' => 'required'
        ];
    }
}
