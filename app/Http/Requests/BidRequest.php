<?php

namespace App\Http\Requests;

use App\Http\Contexts\BidRequestContext;
use Illuminate\Foundation\Http\FormRequest;

class BidRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|max:100',
            'message' => 'required|string|max:1024'
        ];
    }

    public function toContext(): BidRequestContext
    {
        return new BidRequestContext($this->input('email'), $this->input('message'));
    }
}
