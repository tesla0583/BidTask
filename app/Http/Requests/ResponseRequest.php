<?php

namespace App\Http\Requests;

use App\Http\Contexts\BidResponseContext;
use Illuminate\Foundation\Http\FormRequest;

class ResponseRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'comment' => 'required|string|max:1024'
        ];
    }

    public function toContext(): BidResponseContext
    {
        return new BidResponseContext($this->route()->parameter('id'), $this->input('comment'));
    }
}
